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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_blog'); // Sesuai admin form
            $table->date('tanggal_upload'); // Sesuai admin form
            $table->text('excerpt'); // Sesuai admin form - untuk ringkasan
            $table->longText('content'); // Konten lengkap blog
            $table->string('image')->nullable(); // Featured image
            $table->string('author')->default('Admin'); // Penulis
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
