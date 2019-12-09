<?php

namespace Williems\LaravelLangSwitcher;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelLangSwitcherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Williems\LaravelLangSwitcher\LanguageController');
        $this->mergeConfigFrom(__DIR__.'/../config/laravel_lang_switcher.php', 'langswitcher');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([__DIR__.'/../config/laravel_lang_switcher.php' => config_path('langswitcher.php'),
        ], 'config');

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', LocaleMiddleware::class);
    }
}
