<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageView;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Recipe;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Show admin dashboard with statistics
     */
    public function index()
    {
        // Get view statistics
        $totalViews = PageView::getTotalViews();
        $todayViews = PageView::getTodayViews();
        $weekViews = PageView::getWeekViews();
        $monthViews = PageView::getMonthViews();
        
        // Get popular pages
        $popularPages = PageView::getPopularPages(5);
        
        // Get daily views for chart (last 7 days)
        $dailyViews = PageView::getDailyViewsChart(7);
        
        // Get content statistics
        $totalBlogs = Blog::count();
        $totalProducts = Product::count();
        $totalRecipes = Recipe::count();
        
        // Recent activity
        $recentViews = PageView::latest('viewed_at')
                              ->limit(10)
                              ->get();

        return view('admin.dashboard', compact(
            'totalViews',
            'todayViews', 
            'weekViews',
            'monthViews',
            'popularPages',
            'dailyViews',
            'totalBlogs',
            'totalProducts',
            'totalRecipes',
            'recentViews'
        ));
    }

    /**
     * Show detailed statistics page
     */
    public function statistics()
    {
        // Get view statistics
        $totalViews = PageView::getTotalViews();
        $todayViews = PageView::getTodayViews();
        $weekViews = PageView::getWeekViews();
        $monthViews = PageView::getMonthViews();
        
        // Get popular pages
        $popularPages = PageView::getPopularPages(20);
        
        // Get daily views for chart (last 30 days)
        $dailyViews = PageView::getDailyViewsChart(30);
        
        // Get monthly views for the year
        $monthlyViews = PageView::selectRaw('MONTH(viewed_at) as month, COUNT(*) as views')
                               ->whereYear('viewed_at', Carbon::now()->year)
                               ->groupBy('month')
                               ->orderBy('month')
                               ->get();

        return view('admin.statistics', compact(
            'totalViews',
            'todayViews',
            'weekViews', 
            'monthViews',
            'popularPages',
            'dailyViews',
            'monthlyViews'
        ));
    }
}
