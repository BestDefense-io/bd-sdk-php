<?php declare(strict_types=1);
// src/Providers/YourServiceProvider.php

namespace BestdefenseIo\BdSdkPhp\Providers;

use Illuminate\Support\ServiceProvider;
use BestdefenseIo\BdSdkPhp\ApiService;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bestdefense_sdk.php', 'bestdefense_sdk');

        $this->app->singleton(ApiService::class, function ($app) {
            return new ApiService(
                config('bestdefense_sdk.api_token'),
                config('bestdefense_sdk.account_id')
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bestdefense_sdk.php' => config_path('bestdefense_sdk.php'),
        ], 'config');
    }
}