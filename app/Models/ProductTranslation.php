<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'locale',
        'nama_produk',
        'deskripsi'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
