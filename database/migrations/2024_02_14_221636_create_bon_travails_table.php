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
            $table->string("bt_reference")->index()->unique();
            $table->text("requete");
            $table->string("di_reference")->index();
            $table->string("zone_name");
            $table->enum("zone_priorite", [1,2,3,4,5,6]); // 1 == faible // 2 == moyen // 3 == prioritaire
            $table->integer("zone_delais");
            $table->integer("equipement_id");
            $table->integer("prestataire_id");
            $table->integer("last_prestataire_id")->nullable()->default(null); // pour savoir quel est le precedent prestataire qui traitait la demande
            $table->integer("user_id"); // pour savoir quel utilisateur a fait le BT
            $table->string('status');
            $table->datetime('date_echeance')->nullable();

            
            $table->foreign('di_reference')->references('di_reference')->on('demande_interventions')->onDelete('cascade');
            $table->foreign('equipement_id')->references('id')->on('equipements')->onDelete('cascade');
            $table->foreign('prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
            $table->foreign('last_prestataire_id')->references('id')->on('prestataires')->onDelete('cascade');
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
