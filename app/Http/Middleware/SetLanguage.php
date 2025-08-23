<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale', 'id'); // Default to Indonesian
        
        if (in_array($locale, ['id', 'en'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('id');
            Session::put('locale', 'id');
        }

        return $next($request);
    }
}
