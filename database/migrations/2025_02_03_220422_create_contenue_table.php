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
        Schema::create('contenue', function (Blueprint $table) {
            $table->id();
            $table->text('header_a');
            $table->text('header_b')->nullable();
            $table->string('side_bar', 255)->nullable();
            $table->text('footer')->nullable();
            $table->text('home')->nullable();
            $table->string('youtube_video', 255)->nullable();
            $table->string('colis', 10);
            $table->string('ville_couverte', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenue');
    }
};
