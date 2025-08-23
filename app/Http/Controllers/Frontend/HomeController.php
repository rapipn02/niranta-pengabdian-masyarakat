<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products for homepage
        $featuredProducts = Product::where('is_active', true)
                                  ->take(4)
                                  ->get();
        
        // Get latest recipes for homepage  
        $latestRecipes = Recipe::where('is_active', true)
                              ->orderBy('created_at', 'desc')
                              ->take(6)
                              ->get();

        // Get latest featured blogs for homepage
        $latestBlogs = Blog::where('is_published', true)
                          ->where('is_featured', true)
                          ->orderBy('created_at', 'desc')
                          ->take(3)
                          ->get();

        return view('frontend.home', compact('featuredProducts', 'latestRecipes', 'latestBlogs'));
    }
}
