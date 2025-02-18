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
        Schema::create('frais_livraison_livreur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_livreur')->constrained('utilisateurs');
            $table->foreignId('id_ville')->constrained('villes');
            $table->decimal('frais_livraison',8,2);
            $table->decimal('frais_retour',8,2);
            $table->decimal('frais_refus',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frais_livraison_livreur');
    }
};
