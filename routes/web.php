<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\RecipeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Product Page (Dynamic)
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Recipe Page (Dynamic) 
Route::get('/resep', [RecipeController::class, 'index'])->name('resep');
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes');

// Drinks Page (Dynamic)
Route::get('/drinks', [RecipeController::class, 'drinks'])->name('drinks');

// Desserts Page (Dynamic)
Route::get('/desserts', [RecipeController::class, 'desserts'])->name('desserts');

// Recipe Detail Page (Static)
Route::get('/recipe-detail', function () {
    return view('frontend.recipe-detail');
})->name('recipe.detail');

// Blog Detail Page (Static)
Route::get('/blog-detail', function () {
    return view('frontend.blog-detail');
})->name('blog.detail');

// Product Routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

// Recipe Individual Route (for detail pages)
Route::prefix('recipes')->name('recipes.')->group(function () {
    Route::get('/{recipe}', [RecipeController::class, 'show'])->name('show');
});

// Blog Routes (Dynamic)
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{blog}', [BlogController::class, 'show'])->name('show');
});

// But also need the simple /blogs route for navbar
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

// Contact Routes
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

// Custom Login Page (Hidden, accessible via route only)
Route::get('/niranta-login', function () {
    return view('frontend.login');
})->name('custom.login');

// Authentication Routes (Hidden login page)
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('frontend.login');
    })->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/statistics', [App\Http\Controllers\Admin\AdminController::class, 'statistics'])->name('statistics');
    
    // Product Routes
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{product}/toggle-status', [App\Http\Controllers\Admin\ProductController::class, 'toggleStatus'])->name('products.toggle-status');
    
    // Recipe Routes  
    Route::get('/recipes', [App\Http\Controllers\Admin\RecipeController::class, 'index'])->name('recipes');
    Route::get('/recipes/create', [App\Http\Controllers\Admin\RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [App\Http\Controllers\Admin\RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [App\Http\Controllers\Admin\RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [App\Http\Controllers\Admin\RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [App\Http\Controllers\Admin\RecipeController::class, 'destroy'])->name('recipes.destroy');
    Route::patch('/recipes/{recipe}/toggle-status', [App\Http\Controllers\Admin\RecipeController::class, 'toggleStatus'])->name('recipes.toggle-status');
    
    // Blog Routes
    Route::get('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::patch('/blogs/{blog}/toggle-published', [App\Http\Controllers\Admin\BlogController::class, 'togglePublished'])->name('blogs.toggle-published');
    Route::patch('/blogs/{blog}/toggle-featured', [App\Http\Controllers\Admin\BlogController::class, 'toggleFeatured'])->name('blogs.toggle-featured');
});

// Translation Routes
Route::prefix('translate')->name('translate.')->group(function () {
    Route::get('/switch/{locale}', [TranslationController::class, 'switchLanguage'])->name('switch');
    Route::post('/dynamic', [TranslationController::class, 'translateDynamicContent'])->name('dynamic');
    Route::get('/content/{type}/{id}/{field}/{language}', [TranslationController::class, 'getTranslatedContent'])->name('content');
});

require __DIR__.'/auth.php';
