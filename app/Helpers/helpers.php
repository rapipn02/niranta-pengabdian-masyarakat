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

if (!function_exists('recipe_video')) {
    /**
     * Generate URL for recipe videos
     * 
     * @param string $videoPath
     * @return string|null
     */
    function recipe_video($videoPath) {
        if (empty($videoPath)) {
            return null;
        }
        
        // Remove leading slash if exists
        $videoPath = ltrim($videoPath, '/');
        
        // Return storage URL
        return asset('storage/' . $videoPath);
    }
}

if (!function_exists('get_visitor_stats')) {
    /**
     * Get visitor statistics for footer display
     * 
     * @return array
     */
    function get_visitor_stats() {
        try {
            if (!class_exists('App\Models\PageView')) {
                return [
                    'today' => 0,
                    'week' => 0, 
                    'month' => 0,
                    'total' => 0
                ];
            }

            $pageView = new \App\Models\PageView();
            
            return [
                'today' => $pageView::getTodayViews(),
                'week' => $pageView::getWeekViews(),
                'month' => $pageView::getMonthViews(),
                'total' => $pageView::getTotalViews()
            ];
        } catch (\Exception $e) {
            // Fallback jika ada error
            return [
                'today' => 0,
                'week' => 0,
                'month' => 0, 
                'total' => 0
            ];
        }
    }
}