<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;
use Carbon\Carbon;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Only track GET requests to avoid counting API calls, form submissions, etc.
        if ($request->method() === 'GET' && !$request->ajax()) {
            // Skip admin routes and API routes
            $skipRoutes = [
                'admin/',
                'api/',
                'login',
                'register',
                'password/',
                '_debugbar',
                'telescope'
            ];

            $currentPath = $request->path();
            $shouldSkip = false;

            foreach ($skipRoutes as $skipRoute) {
                if (str_starts_with($currentPath, $skipRoute)) {
                    $shouldSkip = true;
                    break;
                }
            }

            if (!$shouldSkip) {
                try {
                    PageView::create([
                        'page_url' => $request->fullUrl(),
                        'page_title' => $this->getPageTitle($request),
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'referer' => $request->header('referer'),
                        'viewed_at' => Carbon::now()
                    ]);
                } catch (\Exception $e) {
                    // Silently fail to avoid breaking the site
                    \Log::error('Failed to track page view: ' . $e->getMessage());
                }
            }
        }

        return $next($request);
    }

    /**
     * Get page title based on route
     */
    private function getPageTitle(Request $request)
    {
        $routeName = $request->route() ? $request->route()->getName() : null;
        
        $titles = [
            'home' => 'Home',
            'about' => 'About Us',
            'products' => 'Products',
            'recipes' => 'Recipes',
            'blogs' => 'Blogs',
            'blogs.show' => 'Blog Detail',
            'recipes.show' => 'Recipe Detail',
            'contact' => 'Contact Us',
            'drinks' => 'Drinks',
            'desserts' => 'Desserts',
        ];

        return $titles[$routeName] ?? 'Page View';
    }
}
