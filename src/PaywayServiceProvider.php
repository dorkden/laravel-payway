<?php

namespace Dorkden\Payway;

use Illuminate\Support\ServiceProvider;


class PaywayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../config/payway.php');

        $this->publishes([
            $config => config_path('payway.php')
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-payway', function () {
            return new Payway;
        });
    }

    public function provides()
    {
        return ["laravel-payway"];
    }
}
