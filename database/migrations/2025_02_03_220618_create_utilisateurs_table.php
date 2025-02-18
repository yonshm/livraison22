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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 30);
            $table->string('cin', 15)->nullable();
            $table->string('telephone', 15)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->foreignId('local')->nullable()->constrained('villes');
            $table->string('adresse', 255)->default('');
            $table->foreignId('id_banque')->nullable()->constrained('banques');
            $table->string('numero_compte', 255)->nullable();
            $table->foreignId('id_role')->nullable()->constrained('roles');
            $table->boolean('status')->default(0);
            $table->string('remember_token', 255)->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
