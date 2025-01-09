<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    
    public function login()
    {
        return view('auth.loginSide');
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
    public function check(Request $request)
    {
        $user = Utilisateur::where('email', $request->email)
            ->where('status', 1)
            ->where('password', $request->password)->get();
        if (count($user) > 0){
            $user = Utilisateur::with('client')->with('role')->where('id',$user[0]->id)->get();
            $user = $user[0];
            if ($user->role->nom_role == 'client') {
                return redirect()->route('clients.index', ['user' => $user]);
            } elseif ($user->role->nom_role == 'admin') {
                return redirect()->route('admins.index', ['user' => $user]);
            } elseif ($user->role->nom_role == 'moderateur') {
                return redirect()->route('moderateurs.index', ['user' => $user]);
            } elseif ($user->role->nom_role == 'livreur') {
                return redirect()->route('livreurs.index', ['user' => $user]);
            }
        } else {
            return view('auth.loginSide');
        }
        //
    }
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
