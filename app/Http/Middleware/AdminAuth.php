<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access admin area.');
        }

        // Cek apakah email user adalah admin yang diizinkan
        $allowedAdminEmail = 'adminniranta@gmail.com';
        
        if (Auth::user()->email !== $allowedAdminEmail) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized access. Only admin can access this area.');
        }

        return $next($request);
    }
}
