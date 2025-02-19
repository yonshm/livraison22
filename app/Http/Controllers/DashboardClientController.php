<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardClientController extends Controller
{
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
}
