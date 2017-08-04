<?php

namespace App\Providers;

use Facades\App\Repositories\DownloadRepository;
use Facades\App\Repositories\FriendRepository;
use Facades\App\Repositories\TagRepository;
use Facades\App\Repositories\ArticleRepository;
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
        //常用扩展包
        view()->share('packages', ArticleRepository::scopeQuery(function ($query){
            return $query->where('category_id',2)->orderBy('clicks','desc')->take(12);
        })->all());
        //热门文章
        view()->share('hotArticles', ArticleRepository::scopeQuery(function ($query){
            return $query->orderBy('clicks','desc')->take(12);
        })->all());
        //tag
        view()->share('tags', TagRepository::scopeQuery(function ($query){
            return $query;
        })->all());
        //友情链接
        view()->share('friends', FriendRepository::scopeQuery(function ($query){
            return $query->orderBy('sort','desc')->take(12);
        })->all());
        //常用下载
        view()->share('downloads', DownloadRepository::scopeQuery(function ($query){
            return $query->orderBy('sort','desc')->take(12);
        })->all());
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
