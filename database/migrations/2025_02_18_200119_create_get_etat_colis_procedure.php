<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGetEtatColisProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getEtatColis');

        $procedure = "
        CREATE PROCEDURE getEtatColis(IN p_id_client INT)
        BEGIN
            SELECT 
                'payé' AS etat, 
                COALESCE(SUM(CASE WHEN etat = 1 THEN 1 ELSE 0 END), 0) AS total
            FROM colis
            WHERE id_client = p_id_client 

            UNION ALL

            SELECT 
                'non payé' AS etat, 
                COALESCE(SUM(CASE WHEN etat = 0 THEN 1 ELSE 0 END), 0) AS total
            FROM colis
            WHERE id_client = p_id_client
            AND colis.bon_ramassage IS NOT NULL;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS getEtatColis');
    }
}