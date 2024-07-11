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
        Schema::create('request_by_equipement_type_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monthly_report_id')
                ->constrained('monthly_reports')
                ->onDelete('cascade')
                ->name('req_equip_type_reports_monthly_report_id_fk'); // Nom de la contrainte de clé étrangère spécifié
            $table->string('etiquette');
            $table->integer('nb_requete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_by_equipement_type_reports', function (Blueprint $table) {
            $table->dropForeign('req_equip_type_reports_monthly_report_id_fk'); // Nom de la contrainte de clé étrangère spécifié
        });
        Schema::dropIfExists('request_by_equipement_type_reports');
    }
};
