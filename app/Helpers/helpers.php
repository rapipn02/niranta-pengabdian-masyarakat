<?php

if (!function_exists('image_url')) {
    /**
     * Generate URL for images stored in storage/app/public/
     * 
     * @param string $path
     * @return string
     */
    function image_url($path) {
        if (empty($path)) {
            return '';
        }
        
        // Remove leading slash if exists
        $path = ltrim($path, '/');
        
        // Return storage URL
        return asset('storage/' . $path);
    }
}

if (!function_exists('product_image')) {
    /**
     * Generate URL for product images
     * 
     * @param string $imagePath
     * @return string
     */
    function product_image($imagePath) {
        if (empty($imagePath)) {
            return asset('storage/images/placeholder-product.jpg');
        }
        
        return image_url($imagePath);
    }
}

if (!function_exists('recipe_image')) {
    /**
     * Generate URL for recipe images
     * 
     * @param string $imagePath
     * @return string
     */
    function recipe_image($imagePath) {
        if (empty($imagePath)) {
            return asset('storage/images/placeholder-recipe.jpg');
        }
        
        return image_url($imagePath);
    }
}

if (!function_exists('blog_image')) {
    /**
     * Generate URL for blog images
     * 
     * @param string $imagePath
     * @return string
     */
    function blog_image($imagePath) {
        if (empty($imagePath)) {
            return asset('storage/images/placeholder-blog.jpg');
        }
        
        return image_url($imagePath);
    }
}