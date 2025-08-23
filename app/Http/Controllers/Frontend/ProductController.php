<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Get active products with translations
        $products = Product::where('is_active', true)
            ->with(['translations' => function($query) {
                $query->where('locale', app()->getLocale());
            }])
            ->paginate(12);
        
        return view('frontend.product', compact('products'));
    }

    public function show(Product $product)
    {
        // Only show active products
        if (!$product->is_active) {
            abort(404);
        }

        // Load translations
        $product->load(['translations' => function($query) {
            $query->where('locale', app()->getLocale());
        }]);

        return view('frontend.product-detail', compact('product'));
    }
}
