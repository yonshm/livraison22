<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facture_ag_client', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_coli')->constrained('colis');
            $table->decimal('total_payee',8,2);
            $table->foreignId('id_responsable')->constrained('utilisateurs');
            $table->decimal('frais_livrison',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_ag_client');
    }
};
