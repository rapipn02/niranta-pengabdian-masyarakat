<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First change enum to varchar to allow data updates
        DB::statement("ALTER TABLE recipes MODIFY jenis VARCHAR(20)");
        
        // Update existing data
        DB::table('recipes')->where('jenis', 'Minuman')->update(['jenis' => 'drink']);
        DB::table('recipes')->where('jenis', 'Dessert')->update(['jenis' => 'dessert']);
        DB::table('recipes')->where('jenis', 'Makanan')->update(['jenis' => 'dessert']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert data
        DB::table('recipes')->where('jenis', 'drink')->update(['jenis' => 'Minuman']);
        DB::table('recipes')->where('jenis', 'dessert')->update(['jenis' => 'Dessert']);
        
        // Change back to original enum
        DB::statement("ALTER TABLE recipes MODIFY jenis ENUM('Minuman', 'Dessert', 'Makanan')");
    }
};
