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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk'); // Sesuai admin form
            $table->string('harga'); // Sesuai admin form (stored as string untuk format Rp)
            $table->string('link_produk')->nullable(); // Sesuai admin form
            $table->string('image')->nullable(); // Upload foto
            $table->text('description')->nullable(); // Untuk card user
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
