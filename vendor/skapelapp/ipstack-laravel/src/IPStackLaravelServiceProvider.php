<?php

namespace Skapelapp\IPStackLaravel;

use Illuminate\Support\ServiceProvider;

class IPStackLaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ipstack.php', 'ipstack'
        );
    
        $this->app->singleton('ipstack', function ($app) {
            return new IPStack(config('ipstack.api_key'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/ipstack.php' => config_path('ipstack.php'),
        ], 'config');
    }
}
