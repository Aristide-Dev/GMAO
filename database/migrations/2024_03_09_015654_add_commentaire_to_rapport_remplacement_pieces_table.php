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
        Schema::table('rapport_remplacement_pieces', function (Blueprint $table) {
            $table->text('commentaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rapport_remplacement_pieces', function (Blueprint $table) {
            $table->dropColumn('commentaire');
        });
    }
};
