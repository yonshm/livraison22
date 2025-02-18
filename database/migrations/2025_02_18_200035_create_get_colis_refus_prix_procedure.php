<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGetColisRefusPrixProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the stored procedure if it exists
        DB::unprepared('DROP PROCEDURE IF EXISTS getColisRefusPrix');

        // Define the stored procedure
        $procedure = "
        CREATE PROCEDURE getColisRefusPrix (IN client_id INT)
        BEGIN
            SELECT 
                IFNULL((v.frais_refus), 0) AS total_colis_refus_prix
            FROM colis c
            INNER JOIN statuses s ON s.id = c.id_status
            INNER JOIN villes v ON v.id = c.id_ville
            WHERE c.id_client = client_id
              AND c.pret_preparation = 1
              AND c.bon_ramassage IS NOT NULL
              AND s.nom_status = 'refuse';
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
        DB::unprepared('DROP PROCEDURE IF EXISTS getColisRefusPrix');
    }
}