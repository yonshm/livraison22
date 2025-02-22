<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Ville;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones = [
            ['nom_zone' => 'agadir'],
            ['nom_zone' => 'casa']
        ];
        $villes = [
            [
                'nom_ville' => 'azrou',
                'ref' => 'AZR',
                'id_zone' => '1',
                'frais_livraison' => '20.00',
                'frais_retour' => '0' ,
                'frais_refus' => '5.00'
            ],
            [
                'nom_ville' => 'casa',
                'ref' => 'CASA',
                'id_zone' => '2',
                'frais_livraison' => '40.00',
                'frais_retour' => '0' ,
                'frais_refus' => '5.00'                
            ],
            [
                'nom_ville' => 'agadir',
                'ref' => 'AGA',
                'id_zone' => '1',
                'frais_livraison' => '35.00',
                'frais_retour' => '0' ,
                'frais_refus' => '5.00'                
            ]
        ];

        foreach ($zones as $z) {
            Zone::create($z);
        }
        foreach ($villes as $v) {
            Ville::create($v);
        }

        $this->command->info('Default zone and villes created successfully.');
    }
}
