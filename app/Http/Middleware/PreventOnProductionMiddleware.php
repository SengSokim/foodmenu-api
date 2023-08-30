<?php

namespace App\Http\Middleware;

use App\Helpers\DateHelper;

use Closure;

class PreventOnProductionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(app()->environment() == 'production') {
            return fail('', 404);
        }

        return $next($request);
    }
}
