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
        Schema::create('varaintes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_varainte', 20);
            $table->string('SKU', 255);
            $table->integer('quantite');
            $table->foreignId('id_produit')->constrained('produits');
            $table->boolean('status')->default(0);
            $table->foreignId('id_responsable')->nullable()->constrained('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varaintes');
    }
};
