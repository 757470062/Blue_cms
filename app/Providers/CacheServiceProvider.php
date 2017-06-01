<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Service\Cache\CacheServiceInterface::class, \App\Service\Cache\CacheService::class);
        $this->app->bind(\App\Service\Cache\Extend\CategoryCacheServiceInterface::class, \App\Service\Cache\Extend\CategoryCacheService::class);
    }
}
