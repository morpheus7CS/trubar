<?php

namespace Wewowweb\Trubar;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Wewowweb\Trubar\Console\InstallCommand;
use Wewowweb\Trubar\Models\TrubarUser;

class TrubarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'trubar');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'trubar');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->registerAuthGuard();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('trubar.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/trubar'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/trubar'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/trubar'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                InstallCommand::class,
            ]);
        }

        Route::namespace('Wewowweb\Trubar\Http\Controllers')
            ->as('trubar.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'trubar');

        // Register the main class to use with the facade
        $this->app->singleton('trubar', function () {
            return new Trubar;
        });
    }

    /**
     * Register the package's authentication guard.
     *
     * @return void
     */
    private function registerAuthGuard()
    {
        $this->app['config']->set('auth.providers.trubar_users', [
            'driver' => 'eloquent',
            'model' => TrubarUser::class,
        ]);
        $this->app['config']->set('auth.guards.trubar', [
            'driver' => 'session',
            'provider' => 'trubar_users',
        ]);
    }
}
