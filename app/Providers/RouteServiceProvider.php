<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
             ->namespace($this->namespace)
             ->group(function() {
                Route::prefix('api')
                        ->group(function() {
                            require base_path('routes/api.php');

                            $this->mapWebsiteWhitelistRoutes();
                        });
             });
    }

    protected function mapWebsiteWhitelistRoutes()
    {
        Route::middleware('whitelist')
            ->group(function () {
                $this->mapAdminApiRoutes();
                $this->mapMobileApiRoutes();
            });
    }

    protected function mapAdminApiRoutes()
    {
        Route::prefix('admin')
            ->namespace('Admin')
            ->middleware('server.status:admin')
            ->group(base_path('routes/admin.api.php'));
    }

    protected function mapMobileApiRoutes()
    {
        Route::prefix('sale')
            ->namespace('Sale')
            ->group(base_path('routes/sale.api.php'));
    }
}
