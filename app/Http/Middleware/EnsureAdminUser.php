<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this area.');
        }

        // Check if the authenticated user is the admin
        if (auth()->user()->email !== 'adminniranta@gmail.com') {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Access denied. Only admin can access this area.');
        }

        return $next($request);
    }
}
