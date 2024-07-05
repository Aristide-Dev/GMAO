<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTempsPriseEnChargeColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Renommer l'ancienne colonne pour éviter les conflits
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->renameColumn('temps_prise_en_charge', 'temps_prise_en_charge_old');
        });

        // Ajouter une nouvelle colonne avec le nouveau type
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->string('temps_prise_en_charge')->nullable();
        });

        // Migrer les données de l'ancienne colonne vers la nouvelle
        DB::table('rapport_interventions')->update([
            'temps_prise_en_charge' => DB::raw('temps_prise_en_charge_old')
        ]);

        // Supprimer l'ancienne colonne
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->dropColumn('temps_prise_en_charge_old');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Renommer la nouvelle colonne pour éviter les conflits
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->renameColumn('temps_prise_en_charge', 'temps_prise_en_charge_new');
        });

        // Ajouter l'ancienne colonne avec le type d'origine
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->integer('temps_prise_en_charge')->nullable();
        });

        // Migrer les données de la nouvelle colonne vers l'ancienne
        DB::table('rapport_interventions')->update([
            'temps_prise_en_charge' => DB::raw('temps_prise_en_charge_new')
        ]);

        // Supprimer la nouvelle colonne
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->dropColumn('temps_prise_en_charge_new');
        });
    }
}