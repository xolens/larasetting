<?php

namespace Xolens\Larasetting;

use Illuminate\Support\ServiceProvider;

class LarasettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/larasetting.php' => config_path('larasetting.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/larasetting.php', 'larasetting'
        );
    }
}