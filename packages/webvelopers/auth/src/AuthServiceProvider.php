<?php

namespace Webvelopers\Auth;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register the package's services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/webvelopers-auth.php',
            'webvelopers-auth'
        );
    }

    /**
     * Bootstrap the package's services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/webvelopers-auth.php' => config_path('webvelopers-auth.php'),
        ]);

        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'webvelopers-auth');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
