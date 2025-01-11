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
        Schema::create('villes', function (Blueprint $table) {
                $table->id();
                $table->string('nom_ville');
                $table->unsignedBigInteger('id_zone');
                $table->string('ref');
                $table->decimal('frais_livraison', 8, 2);
                $table->decimal('frais_retour', 8, 2);
                $table->decimal('frais_refus', 8, 2);
                $table->timestamps();

                $table->foreign('id_zone')->references('id')->on('zones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villes');
    }
};
