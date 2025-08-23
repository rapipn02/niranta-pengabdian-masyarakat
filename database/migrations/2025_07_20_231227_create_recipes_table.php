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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep'); // Sesuai admin form
            $table->enum('jenis', ['Minuman', 'Dessert', 'Makanan']); // Sesuai admin form
            $table->text('deskripsi'); // Sesuai admin form - untuk card user
            $table->json('bahan'); // Array bahan-bahan
            $table->text('cara_membuat'); // Langkah-langkah
            $table->string('image')->nullable(); // Upload foto
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
