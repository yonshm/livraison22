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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit', 30);
            $table->string('SKU', 255)->unique();
            $table->integer('quantite')->default(0);
            $table->string('note', 255)->nullable()->default('');
            $table->boolean('status')->default(0)->comment('en cours / recu');
            $table->foreignId('id_client')->constrained('utilisateurs');
            $table->foreignId('id_business')->constrained('businesses');
            $table->foreignId('id_responsable')->nullable()->constrained('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
