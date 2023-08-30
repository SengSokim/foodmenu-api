<?php

namespace App\Http\Middleware;

use Closure;

class CanEmptyAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!request()->header('Authorization')) {
            return $next($request);
        }

        return app(MultiAuthMiddleware::class)->handle($request, function ($request) use ($next, $guard) {
            //Then process the next request if every tests passed.
            return $next($request);
        }, $guard);
    }
}
