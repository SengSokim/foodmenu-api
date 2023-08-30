<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sale;
use App\Models\User;

class MultiAuthMiddleware
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
        return app(Authenticate::class)->handle($request, function ($request) use ($next, $guard) {
            //Then process the next request if every tests passed.
            switch ($guard) {
                case 'users':
                    if (get_class(auth()->user()) != User::class) {
                        return fail('Unauthenticated.', 401);
                    }
                    break;
                case 'sales':
                    if (get_class(auth()->user()) != Sale::class) {
                        return fail('Unauthenticated.', 401);
                    }
                    break;
            }

            auth($guard)->login(auth()->user());

            return $next($request);
        }, 'sanctum');
    }

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     $authenticatedUser = app(Authenticate::class)->handle($request, function ($request) use ($guard) {
    //         return auth($guard)->user();
    //     }, 'sanctum');

    //     // dd($authenticatedUser);
    //     $expectedGuardModel = $this->getExpectedGuardModel($guard);

    //     if (!$authenticatedUser instanceof $expectedGuardModel) {
    //         return response()->json(['message' => 'Unauthenticated.'], 401);
    //     }

    //     auth($guard)->login($authenticatedUser);

    //     return $next($request);
    // }

    // private function getExpectedGuardModel($guard)
    // {
    //     $guardModels = [
    //         'users' => User::class,
    //         'sales' => Sale::class
    //     ];

    //     return $guardModels[$guard] ?? null;
    // }
}
