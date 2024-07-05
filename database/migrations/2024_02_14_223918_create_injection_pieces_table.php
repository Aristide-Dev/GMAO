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
        Schema::create('injection_pieces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("piece_id");
            $table->string("ri_reference")->index();
            $table->integer("quantite");
            $table->boolean("take_in_stock")->default(true);
            $table->integer("stock_price");
            $table->boolean("take_in_fournisseur")->default(false)->nullable();
            $table->string("fournisseur_name")->nullable();
            $table->integer("fournisseur_price")->default(0);
            $table->string('injection_file')->nullable();
            $table->timestamps();

            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->foreign('ri_reference')->references('ri_reference')->on('rapport_interventions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injection_pieces');
    }
};
