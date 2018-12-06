<?php

namespace Imedev2\Career1;

use Illuminate\Support\ServiceProvider;

class CareerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }
      //  $this->run(__DIR__.'/database/migrationss');
       // $this->loadMigrationsFrom(__DIR__.'/database/migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
