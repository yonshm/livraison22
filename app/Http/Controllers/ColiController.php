<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Carbon\Carbon;
use App\Models\Coli;
use App\Models\Coli_stock;
use App\Models\General;
use App\Models\Produit;
use App\Models\Status;
use App\Models\Varainte;
use App\Models\Ville;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colis = [];
        return view('colis.index', compact('colis'));
    }
    public function listeColis()
    {
        $id_client = session('user')->id;
        $colis = Coli::with('status')->where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->orderByDesc('id')->get();
        return view('colis.index', compact('colis'));
    }
    public function colisAttenderRamassage()
    {
        $id_client = session('user')->id;
        $colis = Coli::where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->orderByDesc('id')->get();
        return view('colis.colisAttenderRamassage', compact('colis'));
    }
    public function colisNonExpedies()
    {
        $id_client = session('user')->id;
        $colis = Coli::where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->orderByDesc('id')->get();
        return view('colis.colisNonExpedies', compact('colis'));
    }

    public function ticketColi($id)
    {
        $id_client = session('user')->id;
        $coli = Coli::with(['bon_ramassage.ville:id,nom_ville', 'business', 'ville.zone:id,nom_zone'])
            ->where('id', $id)
            ->where('id_client', $id_client)
            ->first();

        $general = General::first();

        return view('colis.ticketColi', compact('coli', 'general'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_client = session('user')->id;
        $villes = Ville::all();
        $business = Business::where('id_utilisateur', $id_client)->get();
        return view('colis.create', compact('villes', 'business'));
    }

    /**
     * Store a newly created resource in storage.
     */
    private function trackNumber($idColi, $fromCity, $toCity)
    {
        $currentTime = now()->format('dmyHis');
        $track_number = "$fromCity$toCity$currentTime$idColi";
        return $track_number;
    }

    public function store(Request $request)
    {
        $id_client = session('user')->id;
        try{
            $request->validate([
                'destinataire' => 'required|string|max:255',
                'telephone' => 'required|string|max:20',
                'id_ville' => 'required|integer',
                'id_business' => 'required|exists:businesses,id',
                'adresse' => 'required|string|max:255',
                'marchandise' => 'required|string|max:255',
                'prix' => 'required|numeric',
                'commentaire' => 'nullable|string',
                'ouvrir' => 'nullable|boolean',
                'variant' => 'nullable|array',
                'variant.*.SKU' => 'nullable|string',
                'variant.*.quantity' => 'nullable|integer|min:1',
            ]);

            $dataColi = $request->only([
                    'destinataire', 'telephone', 'id_ville', 'id_business', 'adresse', 'marchandise', 'prix', 'commentaire'
                ]);

            $fromCity = Ville::find($dataColi['id_ville'])->nom_ville[0] ?? 'X';
            $toCity = Ville::find($dataColi['id_ville'])->nom_ville[0] ?? 'X';
            $track_number = $this->trackNumber($id_client, $fromCity, $toCity);

            $request->has('ouvrir') ? $dataColi['ouvrir'] = 1 : $dataColi['ouvrir'] = 0;
            $dataColi['track_number'] = $track_number;
            $dataColi['date_creation'] = now()->toDateString();
            $dataColi['id_client'] = $id_client;
            $dataColi['bon_ramassage'] = null;

            $coli = Coli::create($dataColi);

            if ($request->has('produit') && !empty($request->produit) && $request->produit != null) {
                $produit = $request->input('produit');
                $coli->coli_type = "stock";
                $coli->save();
                foreach ($produit as $key => $quantite) {
                    if (isset($key) && isset($quantite)) {
                        $pro = Produit::where('SKU', $key)->first();
                        if ($pro) {
                            Coli_stock::create([
                                'id_coli' => $coli->id,
                                'SKU' => $key,
                                'quantite' => (int) $quantite <= $pro->quantite ? (int)$quantite : $pro->quantite,
                            ]);
                            if ((int)$quantite <= $pro->quantite) {
                                $pro->quantite -= (int) $quantite;
                            }else{
                                $pro->quantite = 0;
                            }
                                $pro->save();
                        }
                    }
                }
            }
            if ($request->has('variant') && !empty($request->variant) && $request->variant != null) {
                $variant = $request->input('variant');
                $coli->coli_type = "stock";
                $coli->save();
                foreach ($variant as $key => $quantite) {
                    if (isset($key) && isset($quantite)) {
                        $var = Varainte::where('SKU', $key)->first();
                        if ($var) {
                            Coli_stock::create([
                                'id_coli' => $coli->id,
                                'SKU' => $key,
                                'quantite' => (int) $quantite <= $var->quantite ? (int)$quantite : $var->quantite,
                            ]);
                            
                            if ((int)$quantite <= $var->quantite) {
                                $var->quantite -= (int) $quantite ;
                            }else{
                                $var->quantite = 0;
                            }
                                $var->save();
                        }
                    }
                }
            }
            return redirect()->route('colis.create');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function show(string $id)
    {
        $id_client = session('user')->id;
        $coli = Coli::where('id', $id)
            ->where('id_client', $id_client)
            ->with(['ville', 'business'])
            ->firstOrFail();

        return view('colis.show', compact('coli'));
    }



    public function edit(string $id)
    {
        $id_client = session('user')->id;
        $coli = Coli::with('ville')->where('id', $id)
            ->where('id_client', $id_client)
            ->firstOrFail();

        $villes = Ville::all();
        $business = Business::where('id_utilisateur', $id_client)->get();

        return view('colis.edit', compact('coli', 'villes', 'business'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'destinataire' => 'required|string',
            'telephone' => 'required|string|min:10|max:15',
            'id_ville' => 'required|exists:villes,id',
            'id_business' => 'required|exists:businesses,id',
            'adresse' => 'required|string',
            'marchandise' => 'required|string',
            'prix' => 'required|numeric',
            'commentaire' => 'nullable|string',
        ]);
        if ($request->filled('ouvrir')) {
            $request['ouvrir'] = 1;
        } else {
            $request['ouvrir'] = 0;
        }
        $coli = Coli::findOrFail($id);

        $fromCity = Ville::find($request->id_ville)->nom_ville[0] ?? 'X';
        $toCity = Ville::find($request->id_ville)->nom_ville[0] ?? 'X';

        $track_number = $this->trackNumber($coli->id_client, $fromCity, $toCity);

        $coli->update([
            'destinataire' => $request->destinataire,
            'telephone' => $request->telephone,
            'id_ville' => $request->id_ville,
            'adresse' => $request->adresse,
            'prix' => $request->prix,
            'commentaire' => $request->commentaire,
            'ouvrir' => $request->ouvrir,
            'marchandise' => $request->marchandise,
            'id_business' => $request->id_business,
            'track_number' => $track_number,
        ]);
        return redirect()->route('colis.listeColis')->with('success', 'Coli updated successfully.');
    }


    public function destroy(string $id)
    {
        $id_client = session('user')->id;
        $coli = Coli::where('id', $id)
            ->where('id_client', $id_client)
            ->firstOrFail();

        $coli->delete();
        return response()->json(['message' => 'Colis deleted successfully'], 200);
    }

}
