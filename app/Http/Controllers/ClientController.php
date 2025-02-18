<?php

namespace App\Http\Controllers;


use App\Models\Utilisateur;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user')->id;
        $clients = Utilisateur::with('client')->with('banque')->find($user);

        $coliController = new ColiController();
        $coli_info = $coliController->dashboardColis();
        // dd($coli_info);
        return view('clients.index', compact('clients', 'coli_info'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
