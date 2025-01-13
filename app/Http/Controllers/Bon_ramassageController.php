<?php

namespace App\Http\Controllers;

use App\Models\Bon_ramassage;
use App\Models\Coli;
use Illuminate\Http\Request;

class Bon_ramassageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_client = 4;
        $noRamasse = Coli::where('id_client',$id_client)->whereNull('bon_ramassage')->where('pret_preparation',1)->with('ville')->with('business')->get();   
        // $bonsRamassages = Bon_ramassage::with('coli')->with('coli.client')->where('id_client',$id_client)->whereNotNull('bon_ramassage')->with('ville')->with('business')->get();   
        $bonsRamassages = Bon_ramassage::with('coli')->with('ville')->get();  
        $bonsRamassages = Bon_ramassage::whereHas('coli', function($query) use ($id_client) {
                        $query->where('id_client', $id_client);
                    })
                    ->with(['coli' => function($query) use ($id_client) {
                        $query->where('id_client', $id_client);
                    }])
                    ->get(); 


        return view('bons.ramassage.index', compact('bonsRamassages','noRamasse'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_client = 4;
        $noRamasse = Coli::where('id_client',$id_client)->whereNull('bon_ramassage')->where('pret_preparation',1)->with('ville')->with('business')->get();   
        return view('bons.ramassage.create', compact('noRamasse'));
    }
    public function ColiAttendeBonRamassage()
    {
        $id_client = 4;
        $colis = Coli::where('id_client',$id_client)->whereNull('bon_ramassage')->where('pret_preparation',1)->with('ville')->with('business')->get();   
        return view('bons.ramassage.create', compact('colis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
