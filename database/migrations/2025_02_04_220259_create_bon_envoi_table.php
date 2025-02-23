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
        Schema::create('bon_envois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_livraison')->constrained('utilisateurs');
            $table->foreignId('zone')->constrained('zones');
            $table->boolean('arrivee')->default(0)->comment('en route / acces');
            $table->dateTime('date_debut');
            $table->dateTime('ref');
            $table->dateTime('date_arrivee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_envoi');
    }
};
