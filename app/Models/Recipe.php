<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_resep',
        'jenis',
        'deskripsi',
        'bahan',
        'cara_membuat',
        'image',
        'is_active'
    ];

    protected $casts = [
        'bahan' => 'json',
        'is_active' => 'boolean'
    ];

    // Relationship dengan translations - commented out due to autoloading issues
    // Using direct DB queries instead for better reliability
    /*
    public function translations()
    {
        return $this->hasMany(RecipeTranslation::class);
    }
    */

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return DB::table('recipe_translations')
                 ->where('recipe_id', $this->id)
                 ->where('locale', $locale)
                 ->first();
    }

    // Method untuk mendapatkan data sesuai bahasa
    public function getTranslatedName($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->nama_resep : $this->nama_resep;
    }

    public function getTranslatedDescription($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->deskripsi : $this->deskripsi ?? '';
    }

    public function getTranslatedIngredients($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? json_decode($translation->bahan, true) : $this->bahan;
    }

    public function getTranslatedInstructions($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? json_decode($translation->cara_membuat, true) : $this->cara_membuat;
    }

    /**
     * Get the list of available recipe types
     */
    public static function getJenisOptions()
    {
        return [
            'drink' => 'Drinks',
            'dessert' => 'Dessert'
        ];
    }

    /**
     * Scope to get only active recipes
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by type
     */
    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }
}
