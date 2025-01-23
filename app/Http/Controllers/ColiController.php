<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Carbon\Carbon;
use App\Models\Coli;
use App\Models\Ville;
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
        $colis = Coli::where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();
        return view('colis.index', compact('colis'));
    }
    public function colisAttenderRamassage()
    {
        $id_client = session('user')->id;
        $colis = Coli::where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();
        return view('colis.colisAttenderRamassage', compact('colis'));
    }
    public function colisNonExpedies()
    {
        $id_client = session('user')->id;
        $colis = Coli::where('id_client', $id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();
        return view('colis.colisNonExpedies', compact('colis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_client = session('user')->id;
        $villes = Ville::all();
        $business = Business::where('id_utilisateur',$id_client)->get() ;
        return view('colis.create', compact('villes','business'));
    }

    /**
     * Store a newly created resource in storage.
     */
    private function trackNumber($idColi, $fromCity, $toCity)
    {
        $currentTime = now()->format('dmy-His');
        $track_number = "$fromCity$toCity-$currentTime-$idColi";
        return $track_number;
    }
    public function store(Request $request)
    {
        // I Working Here :: Get data from View form ---->
        // $request->validate([
        //     'destinataire' => 'required|string|max:255',
        //     'bon_ramassage' => 'string|max:255',
        //     'telephone' => 'required|string|max:20',
        //     'id_ville' => 'required|integer',
        //     'adresse' => 'required|string|max:255',
        //     'prix' => 'required|numeric',
        //     'commentaire' => 'string',
        //     'ouvrir' => 'boolean',
        //     'marchandise' => 'required|string|max:255',
        // ]);
        
        $data['ouvrir'] = 1;
        $id_client = session('user')->id;
        $track_number = $this->trackNumber($id_client, 'C', 'R');

        $data['destinataire'] = $request->destinataire;
        $data['telephone'] = $request->telephone;
        $data['id_ville'] = $request->id_ville;
        $data['adresse'] = $request->adresse;
        $data['prix'] = $request->prix;
        $data['commentaire'] = $request->commentaire;
        
        $data['track_number'] = $track_number;
        $data['date_creation'] = Carbon::now()->toDateString();
        $data['id_client'] = $id_client;
        $data['bon_ramassage'] = null;
        $data['id_business'] = $request->id_business;


        Coli::create($data);
        return $this->create();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
