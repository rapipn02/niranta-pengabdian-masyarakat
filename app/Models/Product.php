<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga',
        'link_produk',
        'image',
        'is_active'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    // Relationship dengan translations
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Method untuk mendapatkan nama produk sesuai bahasa
    public function getTranslatedName($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->nama_produk : $this->nama_produk;
    }

    // Method untuk mendapatkan deskripsi sesuai bahasa
    public function getTranslatedDescription($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->deskripsi : $this->deskripsi ?? '';
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Scope to get only active products
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
