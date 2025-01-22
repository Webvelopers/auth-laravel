<?php

use Illuminate\Support\Facades\Route;
use Webvelopers\Auth\Http\Controllers\Api\CaptchaController;
use Webvelopers\Auth\Http\Controllers\ForgetPasswordController;
use Webvelopers\Auth\Http\Controllers\SignInController;
use Webvelopers\Auth\Http\Controllers\SignUpController;

Route::get(
    config('w-auth.routes.sign-in.path', '/auth/sign-in'),
    [SignInController::class, 'create']
)->name(
    config('w-auth.routes.sign-in.create', 'auth.sign-in.create')
);

Route::post(
    config('w-auth.routes.sign-in.path', '/auth/sign-in'),
    [SignInController::class, 'store']
)->name(
    config('w-auth.routes.sign-in.store', 'auth.sign-in.store')
);

if (config('w-auth.show.sign-up', true)) {
    Route::get(
        config('w-auth.routes.sign-up.path', '/auth/sign-up'),
        [SignUpController::class, 'create']
    )->name(
        config('w-auth.routes.sign-up.create', 'auth.sign-up.create')
    );

    Route::post(
        config('w-auth.routes.sign-up.path', '/auth/sign-up'),
        [SignUpController::class, 'store']
    )->name(
        config('w-auth.routes.sign-up.store', 'auth.sign-up.store')
    );
}

if (config('w-auth.show.forget-password', true)) {
    Route::get(
        config('w-auth.routes.forget-password.path', '/auth/forget-password'),
        [ForgetPasswordController::class, 'create']
    )->name(
        config('w-auth.routes.forget-password.create', 'auth.forget-password.create')
    );

    Route::post(
        config('w-auth.routes.forget-password.path', '/auth/forget-password'),
        [ForgetPasswordController::class, 'store']
    )->name(
        config('w-auth.routes.forget-password.store', 'auth.forget-password.store')
    );
}

if (config('w-auth.show.api.captcha', true)) {
    Route::get(
        config('w-auth.routes.api.captcha.path', '/auth/api/captcha'),
        [CaptchaController::class, '__invoke']
    )->name(
        config('w-auth.routes.api.captcha.invoke', 'auth.api.captcha')
    );
}
