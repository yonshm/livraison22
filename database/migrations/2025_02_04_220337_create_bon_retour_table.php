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
        Schema::create('bon_retour', function (Blueprint $table) {
            $table->id();
            $table->boolean('recevoir')->default(0)->comment('0 - preparation de retour / 1 - recu par zone de ramassage / 2 - retour client prepare / 3 - recu par (client / stock)');
            $table->foreignId('id_coli')->constrained('colis');
            $table->foreignId('bon_envoi')->nullable()->constrained('bon_envoi');
            $table->dateTime('date_debut');
            $table->dateTime('date_arrivee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_retour');
    }
};
