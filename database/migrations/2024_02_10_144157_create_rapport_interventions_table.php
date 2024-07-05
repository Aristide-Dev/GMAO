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
        Schema::create('rapport_interventions', function (Blueprint $table) {
            $table->id();
            $table->string("ri_reference")->index()->unique();
            $table->foreignId("bt_reference")->index();
            $table->timestamps();

            $table->foreign('bt_reference')->references('bt_reference')->on('bon_travails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_interventions');
    }
};
