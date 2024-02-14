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
            $table->index("piece_id");
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->integer("quantite");
            $table->boolean("take_in_stock")->default(true);
            $table->integer("stock_price");
            $table->boolean("take_in_fournisseur")->nullable();
            $table->boolean("fournisseur_name")->nullable();
            $table->integer("fournisseur_price")->default(0);
            $table->string('injection_file')->nullable();
            $table->timestamps();
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
