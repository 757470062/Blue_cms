<?php

namespace App\Providers;

use Facades\App\Service\Theme\ThemeService;
use Illuminate\Support\ServiceProvider;

class WebProcider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //导航共享数据
        view()->share('menus', ThemeService::getMenu());
        /*view()->composer('*', function ($view) {
            $view->with(['menus' => ThemeService::getMenu()]);
        });*/

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Service\Theme\ThemeService::class, \App\Service\Theme\Theme::class);
    }
}
