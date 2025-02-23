<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Bon_envoi;
use Illuminate\Http\Request;
use App\Models\BonDistribution;
use Laravel\Pail\ValueObjects\Origin\Console;
use Illuminate\Support\Facades\Log;
class BonEnvoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $bonEnvoi = Bon_envoi::where('zone', 5)->get();
        return view('moderateur.bonEnvoi', compact('bonEnvoi'));
    }

    /**
     * update status de bon d'envoi.
     */
    public function updateStatus(Request $request){
        $request->validate([
            'ref' => 'required'
        ],
        [
            'ref.required' => 'La référence est obligatoire. Veuillez saisir une référence valide.'
        ]);
        $bonEnvoi = Bon_envoi::where('ref', $request->ref)->first();

        if (!$bonEnvoi) {
            return redirect()->back()->with('error', 'Référence non trouvée.');
        }else{

            $colis = Coli::whereHas('bon_ramassage.bon_envoi', function ($query) use ($bonEnvoi) {
                $query->where('bon_envoi', $bonEnvoi->id); 
            })->with(['bon_ramassage.bon_envoi']) 
            ->get();
            
            if ($colis->isEmpty()) {
                return response()->json(['message' => 'Aucun colis trouvé pour ce code d\'envoi.'], 404);
            }
        
            if ($bonEnvoi->arrivee == 1) {
            return redirect()->back()->with([
                'colis' => $colis,
                'bonEnvoi' => $bonEnvoi
            ]);
        }
            $bonEnvoi->arrivee = 1;
            $bonEnvoi->save();
                
                return redirect()->back()->with([
                    'success' => 'Statut mis à jour avec succès.',
                    'colis' => $colis,
                    'bonEnvoi' => $bonEnvoi
                ]);  
            }
    }

    public function showScanBonEnvoi()
{
    return view('moderateur.BonEnvoiScan'); 
}

    // scan les colis reçcue par wirehouse
    public function updateColiStatus(Request $request){
        $refColiScanne = $request->input('ref');
        // Log::info('refColiScanne: ' . $refColiScanne);
        $coli = Coli::where('track_number', $refColiScanne)->first();
        Log::info('Searching for Coli with ref: ' . $refColiScanne);
        Log::info(' with ref: ' . $coli);
        if($coli){
            $coli->id_status = 1;
            $coli->save();
            return response()->json(['success' => true, 'message' => 'Colis updated']);
        }
        return response()->json(['success' => false, 'message' => 'Error message'], 400);
    }
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

    /**
     * Remove the specified resource from storage.
     */
    public function createBonDistribution(string $id)
    {
        //
    }

}
