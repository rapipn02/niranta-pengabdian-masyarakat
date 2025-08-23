<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_blog',
        'tanggal_upload',
        'excerpt',
        'content',
        'image',
        'author',
        'is_published',
        'is_featured'
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
        'is_published' => 'boolean',
        'is_featured' => 'boolean'
    ];

    // Relationship dengan translations - commented out due to autoloading issues
    // Using direct DB queries instead for better reliability
    /*
    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }
    */

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return DB::table('blog_translations')
                 ->where('blog_id', $this->id)
                 ->where('locale', $locale)
                 ->first();
    }

    // Method untuk mendapatkan data sesuai bahasa
    public function getTranslatedTitle($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->judul_blog : $this->judul_blog;
    }

    public function getTranslatedContent($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->content : $this->content;
    }

    public function getTranslatedExcerpt($locale = null)
    {
        $translation = $this->translation($locale);
        return $translation ? $translation->excerpt : $this->excerpt ?? '';
    }

    /**
     * Get formatted upload date
     */
    public function getFormattedDateAttribute()
    {
        return $this->tanggal_upload->format('d F Y');
    }

    /**
     * Get formatted upload date for forms
     */
    public function getFormattedDateInputAttribute()
    {
        return $this->tanggal_upload->format('Y-m-d');
    }

    /**
     * Scope to get only published blogs
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get only featured blogs
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to order by upload date descending
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal_upload', 'desc');
    }
}
