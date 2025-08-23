<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Get published blogs (translations loaded via helper methods)
        $blogs = Blog::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
        // Get featured blogs for homepage
        $featured_blogs = Blog::where('is_published', true)
                             ->where('is_featured', true)
                             ->orderBy('created_at', 'desc')
                             ->take(3)
                             ->get();
        
        return view('frontend.blogs', compact('blogs', 'featured_blogs'));
    }

    public function show(Blog $blog)
    {
        // Only show published blogs
        if (!$blog->is_published) {
            abort(404);
        }

        // Get related blogs (other published blogs, excluding current blog)
        $relatedBlogs = Blog::where('is_published', true)
                           ->where('id', '!=', $blog->id)
                           ->orderBy('created_at', 'desc')
                           ->take(3)
                           ->get();

        return view('frontend.blog-detail', compact('blog', 'relatedBlogs'));
    }
}
