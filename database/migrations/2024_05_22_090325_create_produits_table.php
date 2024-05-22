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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom_produit');
            $table->decimal('prix_produit', 8, 2);
            $table->string('image_produit');
            $table->integer('stock_produit');
            $table->string('reference_produit');
            $table->text('description_produit');
            $table->foreignId('id_cat')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
