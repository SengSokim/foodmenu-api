<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
// use App\Helpers\UserSystemInfoHelper;
// use App\Models\BlackListAccess;

class WebsiteWhitelistMiddleware
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
        if (is_array(config('whitelist.webistes')) && !in_array($request->ip(), config('whitelist.webistes'))) {
            // $agent = new Agent();
    
            // if (null !== $qs = $request->getQueryString()) {
            //     $qs = '?'.$qs;
            // }

            // BlackListAccess::create([
            //     'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            //     'plateform' => $request->segment(2),
            //     'url' => $request->getBaseUrl().request()->getPathInfo().$qs,
            //     'device' => UserSystemInfoHelper::get_device(),
            //     'device_name' => $agent->device(),
            //     'browsers' => UserSystemInfoHelper::get_browsers(),
            //     'os' => UserSystemInfoHelper::get_os(),
            //     'ip' => $request->ip(),
            //     'platform' => $platform = $agent->platform(),
            //     'version' => $agent->version($platform),
            // ]);

            abort(403);
         }

        return $next($request);
    }
}
