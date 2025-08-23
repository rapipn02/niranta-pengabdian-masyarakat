<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get dashboard statistics
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_recipes' => Recipe::count(),
            'active_recipes' => Recipe::where('is_active', true)->count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('is_published', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
