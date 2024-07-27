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
        Schema::table('equipements', function (Blueprint $table) {
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->string('produit')->nullable();
            $table->year('annee_fabrication')->nullable();
            $table->string('puissance')->nullable();
            $table->string('observations')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipements', function (Blueprint $table) {
            $table->dropColumn('marque');
            $table->dropColumn('type');
            $table->dropColumn('produit');
            $table->dropColumn('annee_fabrication');
            $table->dropColumn('puissance');
            $table->dropColumn('observations');
        });
    }
};
