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
        Schema::create('bon_travails', function (Blueprint $table) {
            $table->id();
            $table->text("requete");
            $table->index("zone_id");
            $table->index("equipement_id");
            $table->index("prestataire_id");
            $table->index("user_id"); // pour savoir quel utilisateur a fait le BT
            $table->string('status');

            
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_travails');
    }
};
