<?php

namespace App\Providers;

use App\Models\Module;
use App\Repositories\ArticleRepository\ArticleRepository;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\EgRepository\EgRepository;
use App\Repositories\ModuleRepository\ModuleRepository;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //自定义Facade
        /*$this->app->singleton('EgRepository', function($app){
            return new EgRepository();
        });*/
        $this->app->singleton('ArticleRepository', function($app){
           return new ArticleRepository();
       });
        $this->app->singleton('ModuleRepository', function($app){
           return new ModuleRepository();
       });
        $this->app->singleton('CategoryRepository', function($app){
            return new CategoryRepository();
        });
    }
}
