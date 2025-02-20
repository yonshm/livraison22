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
        Schema::create('coli_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_coli')->constrained('colis');
            $table->string('SKU', 255);
            $table->integer('quantite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coli_stocks');
    }
};
