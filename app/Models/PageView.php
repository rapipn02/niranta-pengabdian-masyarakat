<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_url',
        'page_title',
        'ip_address',
        'user_agent',
        'referer',
        'viewed_at'
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    /**
     * Get total views count
     */
    public static function getTotalViews()
    {
        return self::count();
    }

    /**
     * Get today's views count
     */
    public static function getTodayViews()
    {
        return self::whereDate('viewed_at', Carbon::today())->count();
    }

    /**
     * Get this week's views count
     */
    public static function getWeekViews()
    {
        return self::whereBetween('viewed_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
    }

    /**
     * Get this month's views count
     */
    public static function getMonthViews()
    {
        return self::whereMonth('viewed_at', Carbon::now()->month)
                   ->whereYear('viewed_at', Carbon::now()->year)
                   ->count();
    }

    /**
     * Get popular pages
     */
    public static function getPopularPages($limit = 10)
    {
        return self::selectRaw('page_url, page_title, COUNT(*) as views_count')
                   ->groupBy('page_url', 'page_title')
                   ->orderBy('views_count', 'desc')
                   ->limit($limit)
                   ->get();
    }

    /**
     * Get daily views for chart (last 30 days)
     */
    public static function getDailyViewsChart($days = 30)
    {
        return self::selectRaw('DATE(viewed_at) as date, COUNT(*) as views')
                   ->where('viewed_at', '>=', Carbon::now()->subDays($days))
                   ->groupBy('date')
                   ->orderBy('date')
                   ->get();
    }
}