<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class DebugRequestMiddleware
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
        $response = $next($request);

        try {
            if(config('app.debug') && $response instanceof JsonResponse && app('debugbar')->isEnabled()) {
                if($request->has('_debug') || $request->has('_full_debug')) {
                    if($request->has('_debug')) {
                        $queries = app('debugbar')->getData()['queries'];
                        $statements = $queries['statements'];
                        $debugbar = [
                            'queries' => Arr::only($queries, ['nb_statements', 'nb_failed_statements', 'accumulated_duration', 'accumulated_duration_str']) + [
                                    'statements' => array_map(function ($statement) { return Arr::only($statement, ['sql', 'params', 'bindings', 'duration_str']);}, $statements)
                                ]
                        ];
                    } else {
                        $debugbar = app('debugbar')->getData();
                    }

                    $response->setData($response->getData(true) + [
                            'debugbar' => $debugbar,
                        ]);
                }
            }
        } catch (\Exception $e) {}

        return $response;
    }
}
