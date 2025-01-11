<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Ville;
use App\Models\Monnie;
use App\Models\General;
use Exception;
use Illuminate\Http\Request;

class GeneralConteroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monnies = Monnie::all();
        $zones = Zone::all();
        $general = General::with('monnie')->with('zone')->find(1);
        return view('admins.general', compact('general','monnies','zones'));
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
       try{
            $request->validate([
                'nom' => 'required|string|max:25',
                'id_monnie' => 'required|exists:monnies,id',
                'telephone_a' => 'required|string|max:15',
                'telephone_b' => 'nullable|string|max:15',
                'fix' => 'nullable|string|max:20',
                'email' => 'required|email|max:40',
                'site_lien' => 'required|url|max:255',
                'lien_admin' => 'required|url|max:255',
                'lien_client' => 'required|url|max:255',
                'zone_principal' => 'required|exists:zones,id',
                'adresse' => 'required|string|max:255',
            ]);
            $general = General::find($id);
            $general->update($request->all());
            dd($general);
            return redirect()->route('general.index');
        }catch(Exception $err){
            return response()->json([
            'error' => 'Failed to update General',
            'message' => $err->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
