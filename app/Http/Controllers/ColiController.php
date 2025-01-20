<?php

namespace App\Http\Controllers;

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
        $id_client = 4;
        $colis = Coli::where('id_client',$id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();   
        return view('colis.index',compact('colis'));
    }
    public function colisAttenderRamassage()
    {
        $id_client = 4;
        $colis = Coli::where('id_client',$id_client)->whereNull('bon_ramassage')->with('ville')->with('business')->get();   
        return view('colis.colisAttenderRamassage',compact('colis'));
    }
    public function colisNonExpedies()
    {
        $colis = Coli::where('id_client',4)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();     
        return view('colis.colisNonExpedies',compact('colis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('colis.create',compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // I Working Here :: Get data from View form ---->
            // $request->validate([
            //     'destinataire' => 'required|string|max:255',
            //     'bon_ramassage' => 'required|string|max:255',
            //     'telephone' => 'required|string|max:20',
            //     'id_ville' => 'required|integer',
            //     'adresse' => 'required|string|max:255',
            //     'prix' => 'required|numeric',
            //     'commentaire' => 'required|string',
            //     'ref' => 'required|string|max:255',
            //     'ouvrir' => 'required|boolean',
            //     'date_creation' => 'required|date',
            //     'marchandise' => 'string|max:255',
            //     'id_client' => 'required|exists:utilisateurs,id']);
            // $data['created_at'] = now();
            // $data['updated_at'] = now();
            // $data['ouvrir'] = 1;

            $data['ref'] = "REF-002";
            $data['date_creation'] = Carbon::now()->toDateString();
            $data['id_client'] = 4;
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
