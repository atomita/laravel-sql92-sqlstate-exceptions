<?php

namespace atomita\LaravelSql92SqlstateExceptions;

use Illuminate\Support\ServiceProvider;

class LaravelSql92SqlstateExceptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-sql92-sqlstate-exceptions');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-sql92-sqlstate-exceptions');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-sql92-sqlstate-exceptions.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-sql92-sqlstate-exceptions'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-sql92-sqlstate-exceptions'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-sql92-sqlstate-exceptions'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-sql92-sqlstate-exceptions');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-sql92-sqlstate-exceptions', function () {
            return new LaravelSql92SqlstateExceptions;
        });
    }
}
