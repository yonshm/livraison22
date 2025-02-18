<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGetTopVillesProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getTopVilles');
        
        $procedure = "
        CREATE PROCEDURE getTopVilles(IN p_id_client INT)
        BEGIN
            SELECT v.id, v.nom_ville, COUNT(c.id) AS colis_count
            FROM villes v
            LEFT JOIN colis c ON v.id = c.id_ville
            WHERE c.id_client = p_id_client
            GROUP BY v.id
            ORDER BY colis_count DESC
            LIMIT 10;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS getTopVilles');
    }
}