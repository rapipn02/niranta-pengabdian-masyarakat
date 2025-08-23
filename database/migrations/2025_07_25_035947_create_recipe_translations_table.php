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
        Schema::create('recipe_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->string('locale', 2); // 'en' atau 'id'
            $table->string('nama_resep');
            $table->text('deskripsi')->nullable();
            $table->json('bahan')->nullable(); // Array bahan dalam bahasa Inggris
            $table->json('cara_membuat')->nullable(); // Array langkah dalam bahasa Inggris
            $table->timestamps();
            
            $table->unique(['recipe_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_translations');
    }
};
