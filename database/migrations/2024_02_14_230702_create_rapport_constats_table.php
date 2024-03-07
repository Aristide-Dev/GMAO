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
        Schema::create('rapport_constats', function (Blueprint $table) {
            $table->id();
            $table->string("bt_reference");
            $table->string('rapport_constat_file')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('bt_reference')->references('bt_reference')->on('bon_travails')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_constats');
    }
};
