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
        // First, update existing data to new values
        DB::table('recipes')->where('jenis', 'Minuman')->update(['jenis' => 'drink']);
        DB::table('recipes')->where('jenis', 'Dessert')->update(['jenis' => 'dessert']);
        DB::table('recipes')->where('jenis', 'Makanan')->update(['jenis' => 'dessert']);
        
        // Then alter the enum to new values
        DB::statement("ALTER TABLE recipes MODIFY jenis ENUM('drink', 'dessert')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First alter back to old enum
        DB::statement("ALTER TABLE recipes MODIFY jenis ENUM('Minuman', 'Dessert', 'Makanan')");
        
        // Then update data back
        DB::table('recipes')->where('jenis', 'drink')->update(['jenis' => 'Minuman']);
        DB::table('recipes')->where('jenis', 'dessert')->update(['jenis' => 'Dessert']);
    }
};
