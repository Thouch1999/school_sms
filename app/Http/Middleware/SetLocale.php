<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from URL (first segment)
        $locale = $request->segment(1);

        // Check if locale is valid
        if (in_array($locale, ['en', 'kh'])) {
            app()->setLocale($locale);
            session(['locale' => $locale]);
        } else {
            // Default to session locale or 'en'
            $locale = session('locale', 'en');
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
