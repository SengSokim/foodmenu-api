<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('addCreateUpdateDeleteBy', function () {
            $this->foreignId('created_by_id')->nullable();
            $this->string('created_by_type')->nullable();
            $this->foreignId('updated_by_id')->nullable();
            $this->string('updated_by_type')->nullable();
            $this->foreignId('deleted_by_id')->nullable();
            $this->string('deleted_by_type')->nullable();
        });
    }
}
