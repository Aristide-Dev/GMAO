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
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->integer('temps_prise_en_charge')->nullable(); // stocker en minute
            $table->enum('kpi',[0, 1])->nullable(); // delais => 1, hors delais => 0,
            $table->string('numero_devis')->nullable();
            $table->string('bon_commande')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rapport_interventions', function (Blueprint $table) {
            $table->dropColumn('temps_prise_en_charge');
            $table->dropColumn('kpi');
            $table->dropColumn('numero_devis');
            $table->dropColumn('bon_commande');
        });
    }
};
