<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        // Get active recipes (translations loaded via helper methods)
        $recipes = Recipe::where('is_active', true)
                        ->paginate(12);
        
        // Separate by type for better organization
        $drinks = Recipe::where('is_active', true)
                       ->where('jenis', 'drink')
                       ->take(6)
                       ->get();
                       
        $desserts = Recipe::where('is_active', true)
                        ->where('jenis', 'dessert')
                        ->take(6)
                        ->get();
        
        return view('frontend.resep', compact('recipes', 'drinks', 'desserts'));
    }

    public function show(Recipe $recipe)
    {
        // Only show active recipes
        if (!$recipe->is_active) {
            abort(404);
        }

        // Get related recipes (same type, excluding current recipe)
        $relatedRecipes = Recipe::where('is_active', true)
                               ->where('jenis', $recipe->jenis)
                               ->where('id', '!=', $recipe->id)
                               ->take(3)
                               ->get();

        return view('frontend.recipe-detail', compact('recipe', 'relatedRecipes'));
    }

    public function drinks()
    {
        // Get only drink recipes
        $drinks = Recipe::where('is_active', true)
                       ->where('jenis', 'drink')
                       ->paginate(12);
        
        return view('frontend.drinks', compact('drinks'));
    }

    public function desserts()
    {
        // Get only dessert recipes
        $desserts = Recipe::where('is_active', true)
                        ->where('jenis', 'dessert')
                        ->paginate(12);
        
        return view('frontend.desserts', compact('desserts'));
    }
}
