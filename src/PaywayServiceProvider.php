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

        $this->registerPublishing();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
    }

    public function provides()
    {
        return ["laravel-payway"];
    }

    /**
     * Setup the configuration for Cashier.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/payway.php', 'payway'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/payway.php' => $this->app->configPath('payway.php'),
            ], 'payway-config');
        }
    }
}
