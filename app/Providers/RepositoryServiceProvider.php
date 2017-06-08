<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\ArticleRepository::class, \App\Repositories\ArticleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ModuleRepository::class, \App\Repositories\ModuleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FriendRepository::class, \App\Repositories\FriendRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagArticleRepository::class, \App\Repositories\TagArticleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagModuleRepository::class, \App\Repositories\TagModuleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PictureRepository::class, \App\Repositories\PictureRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PictureSourceRepository::class, \App\Repositories\PictureSourceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DownloadRepository::class, \App\Repositories\DownloadRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VidioRepository::class, \App\Repositories\VidioRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VidioSourceRepository::class, \App\Repositories\VidioSourceRepositoryEloquent::class);
        //:end-bindings:
    }
}
