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
        Schema::table('users', function (Blueprint $table) {
            $table->enum("role", ['super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent', 'commercial'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum("role", ['super_admin', 'admin', 'maintenance', 'demandeur', 'prestataire_admin', 'agent'])->change();
        });
    }
};
