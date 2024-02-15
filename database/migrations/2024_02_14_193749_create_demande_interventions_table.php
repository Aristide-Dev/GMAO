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
        Schema::create('demande_interventions', function (Blueprint $table) {
            $table->id();
            $table->integer('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->integer('demandeur_id');
            $table->foreign('demandeur_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('demande_file')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_interventions');
    }
};
