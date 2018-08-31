<?php

namespace Xolens\PgLarasetting;

use Illuminate\Support\ServiceProvider;

class PgLarasettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/pglarasetting.php' => config_path('pglarasetting.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/pglarasetting.php', 'pglarasetting'
        );
    }
}