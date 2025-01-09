<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
        $user = Utilisateur::with('client')->with('role')->find(8);
        if(!empty($user) and $user->id != 0){

            return view('admins.index', compact('user'));
        }else{
            return redirect()->route('auth.login');
        }
    }

    public function showClients()
    {
        $clients = Utilisateur::with('client')->with('banque')->with('ville')->get();
        return view('admins.showClients',compact('clients'));
        // return view();
    }

    public function test()
    {
        return view('admins.in');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
