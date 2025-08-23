<?php

if (!function_exists('image_url')) {
    /**
     * Generate URL for images stored in public_html/images/
     * 
     * @param string $path
     * @return string
     */
    function image_url($path) {
        if (empty($path)) {
            return '';
        }
        
        // Remove 'images/' if it exists at the beginning
        $path = ltrim($path, '/');
        if (strpos($path, 'images/') === 0) {
            $path = substr($path, 7); // Remove 'images/' prefix
        }
        
        // Always use root domain for images (hardcoded for now)
        return 'https://nirantagulaaren.com/images/' . $path;
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
            return image_url('placeholder-product.jpg');
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
            return image_url('placeholder-recipe.jpg');
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
            return image_url('placeholder-blog.jpg');
        }
        
        return image_url($imagePath);
    }
}
