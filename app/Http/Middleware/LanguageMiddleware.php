<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $default = null)
    {
        app()->setLocale($request->header('Language') == 'km' ? 'km' : 'en');

        return $next($request);
    }
}
