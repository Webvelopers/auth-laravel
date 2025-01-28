<?php

namespace Webvelopers\Auth;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register the package's services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/w-auth.php',
            'w-auth'
        );
    }

    /**
     * Bootstrap the package's services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/w-auth.php' => config_path('w-auth.php'),
            __DIR__.'/../public' => public_path('vendor/webvelopers/auth'),
        ], 'w-auth');

        $this->loadJsonTranslationsFrom(__DIR__.'/../lang');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'w-auth');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        Blade::component('captcha-component', 'Webvelopers\Auth\View\Components\CaptchaComponent');
    }
}
