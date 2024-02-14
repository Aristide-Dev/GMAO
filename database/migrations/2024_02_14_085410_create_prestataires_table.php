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
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('telephone_verified_at')->nullable();
            $table->string('adresse')->nullable();
            $table->index('prestataire_admin_id')->nullable();
            $table->foreign('prestataire_admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestataires');
    }
};
