<?php

namespace Bab55z\LaravelLocaleSwitcher;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelLocaleSwitcherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Bab55z\LaravelLocaleSwitcher\LanguageController');
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
