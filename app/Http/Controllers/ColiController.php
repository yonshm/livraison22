<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Carbon\Carbon;
use App\Models\Coli;
use App\Models\General;
use App\Models\Status;
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
        // $data['ouvrir'] = 1;
        // $id_client = session('user')->id;
        // $track_number = $this->trackNumber($id_client, 'C', 'R');

        // $data['destinataire'] = $request->destinataire;
        // $data['telephone'] = $request->telephone;
        // $data['id_ville'] = $request->id_ville;
        // $data['adresse'] = $request->adresse;
        // $data['prix'] = $request->prix;
        // $data['commentaire'] = $request->commentaire;

        // $data['track_number'] = $track_number;
        // $data['date_creation'] = Carbon::now()->toDateString();
        // $data['id_client'] = $id_client;
        // $data['bon_ramassage'] = null;
        // $data['id_business'] = $request->id_business;


        // Coli::create($data);
        // return $this->create();

        $request->validate([
            'destinataire' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'id_ville' => 'required|integer',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'commentaire' => 'nullable|string',
            'ouvrir' => 'boolean',
            'marchandise' => 'required|string|max:255',
            'id_business' => 'required|integer',
        ]);

        $data = $request->all();
        $data['ouvrir'] = 1;
        $id_client = session('user')->id;

        $fromCity = Ville::find($request->id_ville)->nom_ville[0] ?? 'X';
        $toCity = Ville::find($request->id_ville)->nom_ville[0] ?? 'X';


        $track_number = $this->trackNumber($id_client, $fromCity, $toCity);

        $data['track_number'] = $track_number;
        $data['date_creation'] = now()->toDateString();
        $data['id_client'] = $id_client;
        $data['bon_ramassage'] = null;

        Coli::create($data);

        return redirect()->route('colis.listeColis')->with('success', 'Coli created successfully.');
    }

    public function dashboardColis()
    {
        $data = (object) [
            'totalColis' => $this->totalColis(),
            'totalColisLivres' => $this->totalColisBy('livre'),
            'totalColisEnCours' => $this->totalColisBy(null),
            'totalColisRefus' => $this->totalColisBy('refuse'),
            'totalPrix' => $this->totalPrix(),
            'totalColisPrix' => $this->totalColisPrix(),
            'totalColisEnCoursPrix' => $this->totalColisEnCoursPrix(),
            'totalColisLivresPrix' => $this->totalColisLivresPrix(),
            'totalColisRefusPrix' => $this->totalColisRefusPrix(),
            'etatColis' => $this->getEtatColis()
        ];
        return $data;
    }

    // Dashboard Statistque :::::::::::::::
    private function totalColis()
    {
        $id_client = session('user')->id;
        $totalColis = Coli::where('id_client', $id_client)
            ->where('pret_preparation', 1)
            ->whereNotNull('bon_ramassage')
            ->count('id');
        return number_format((int) $totalColis);

    }
    private function totalColisBy($nom_status)
    {
        $id_client = session('user')->id;
        if ($nom_status) {
            $id_s = Status::where('nom_status', $nom_status)->first();
            $totalColisBy = Coli::where('id_client', $id_client)
                ->where('pret_preparation', 1)
                ->whereNotNull('bon_ramassage')
                ->where('id_status', $id_s->id)
                ->count('id');
        } else {
            $totalColisBy = Coli::where('id_client', $id_client)
                ->where('pret_preparation', 1)
                ->whereNotNull('bon_ramassage')
                ->whereNull('id_status')
                ->count('id');
        }
        return number_format((int) $totalColisBy);
    }
    private function totalColisPrix()
    {
        $id_client = session('user')->id;
        $totalPrix = Coli::where('id_client', $id_client)
            ->where('pret_preparation', 1)
            ->whereNotNull('bon_ramassage')
            ->sum('prix');
        return number_format((float) $totalPrix, 2, '.', '');

    }
    private function totalColisEnCoursPrix()
    {
        return 100;
    }
    private function totalPrix()
    {

        $chiffreAffaire = $this->totalColisLivresPrix() - $this->totalColisRefusPrix();

        return number_format((float) $chiffreAffaire, 2, '.', '');

    }
    private function totalColisLivresPrix()
    {
        $id_client = session('user')->id;
        $results = DB::select('CALL get_colis_livre_prix(?)', [$id_client]);

        $total_coli_livre_prix = $results[0]->total_colis_livre_prix;

        return number_format((float) $total_coli_livre_prix, 2, '.', '');
    }
    private function totalColisRefusPrix()
    {
        $id_client = session('user')->id;
        $results = DB::select('CALL getColisRefusPrix(?)', [$id_client]);

        $total_refuse_prix = 0;
        foreach ($results as $r) {
            $total_refuse_prix += $r->total_colis_refus_prix;
        }
        return number_format((float) $total_refuse_prix, 2, '.', '');
    }
    private function getEtatColis()
    {
        $id_client = session('user')->id;
        $coliEtat = DB::select("CALL getEtatColis(:id_client)", ['id_client' => $id_client]);
        return $coliEtat;
    }
    public function getTopVilles()
    {
        $id_client = session('user')->id;
        $topVilles = DB::select("CALL getTopVilles(:id_client)", ['id_client' => $id_client]);

        $topVilles = collect($topVilles)->map(function ($ville) {
            return ['nom_ville' => $ville->nom_ville, 'totalColi' => $ville->colis_count];
        });
        return response()->json($topVilles);
    }
    // End


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
        $coli = Coli::where('id', $id)
            ->where('id_client', $id_client)
            ->firstOrFail();

        $villes = Ville::all();
        $businesses = Business::where('id_utilisateur', $id_client)->get();

        return view('colis.edit', compact('coli', 'villes', 'businesses'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'destinataire' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'id_ville' => 'required|integer',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'commentaire' => 'nullable|string',
            'ouvrir' => 'boolean',
            'marchandise' => 'required|string|max:255',
            'id_business' => 'required|integer',
        ]);

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

        return redirect()->route('colis.index')->with('success', 'Coli updated successfully.');
    }


    public function destroy(string $id)
    {
        $id_client = session('user')->id;
        $coli = Coli::where('id', $id)
            ->where('id_client', $id_client)
            ->firstOrFail();

        $coli->delete();

        return redirect()->route('colis.listeColis')->with('success', 'Coli deleted successfully.');
    }

}
