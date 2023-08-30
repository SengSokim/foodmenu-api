<?php

namespace App\Http\Middleware;

use Closure;

class ServerStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $system = null)
    {
        switch(config('server.'.$system.'.status')) {
            case 'maintenance':
                abort(fail(__('messages.server.down')));
                break;
        }

        return $next($request);
    }
}
