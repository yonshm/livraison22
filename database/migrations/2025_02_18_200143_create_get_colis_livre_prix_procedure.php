<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGetColisLivrePrixProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS get_colis_livre_prix');
        
        $procedure = "
        CREATE PROCEDURE get_colis_livre_prix(IN id_client INT)
        BEGIN
            SELECT 
                IFNULL(SUM(c.prix - CASE WHEN s.nom_status = 'livre' THEN v.frais_livraison ELSE 0 END), 0) AS total_colis_livre_prix
            FROM colis c
            INNER JOIN statuses s ON s.id = c.id_status
            INNER JOIN villes v ON v.id = c.id_ville
            WHERE c.id_client = id_client 
              AND c.pret_preparation = 1
              AND c.bon_ramassage IS NOT NULL
              AND s.nom_status = 'livre';
        END
        ";

        // Execute the raw SQL
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the stored procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS get_colis_livre_prix');
    }
}