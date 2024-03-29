<?php

declare(strict_types=1);

namespace Joy\VoyagerLoginAsUser;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\VoyagerLoginAsUser\Console\Commands\LoginAsUser;
use TCG\Voyager\Facades\Voyager;

/**
 * Class VoyagerLoginAsUserServiceProvider
 *
 * @category  Package
 * @package   JoyVoyagerLoginAsUser
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-voyager-login-as-user/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-voyager-login-as-user
 */
class VoyagerLoginAsUserServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addAction(\Joy\VoyagerLoginAsUser\Actions\LoginAsUserAction::class);

        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-voyager-login-as-user');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        if (config('joy-voyager-login-as-user.database.autoload_migrations', true)) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-voyager-login-as-user');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-voyager-login-as-user.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/voyager-login-as-user.php', 'joy-voyager-login-as-user');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/voyager-login-as-user.php' => config_path('joy-voyager-login-as-user.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-voyager-login-as-user'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-voyager-login-as-user'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->app->singleton('command.joy.voyager.login-as-user', function () {
            return new LoginAsUser();
        });

        $this->commands([
            'command.joy.voyager.login-as-user',
        ]);
    }
}
