<?php

use Illuminate\Support\Facades\Route;
use Webvelopers\Auth\Http\Controllers\SignInController;
use Webvelopers\Auth\Http\Controllers\SignUpController;
use Webvelopers\Auth\Http\Controllers\ForgetPasswordController;

Route::get(
    config('w-auth.routes.sign-in.path', '/auth/sign-in'),
    [SignInController::class, 'create']
);

Route::post(
    config('w-auth.routes.sign-in.path', '/auth/sign-in'),
    [SignInController::class, 'store']
)->name(
    config('w-auth.routes.sign-in.name', 'auth.sign-in')
);

Route::get(
    config('w-auth.routes.sign-up.path', '/auth/sign-up'),
    [SignUpController::class, 'create']
);

Route::post(
    config('w-auth.routes.sign-up.path', '/auth/sign-up'),
    [SignUpController::class, 'store']
)->name(
    config('w-auth.routes.sign-up.name', 'auth.sign-up')
);

Route::get(
    config('w-auth.routes.forget-password.path', '/auth/forget-password'),
    [ForgetPasswordController::class, 'create']
);

Route::post(
    config('w-auth.routes.forget-password.path', '/auth/forget-password'),
    [ForgetPasswordController::class, 'store']
)->name(
    config('w-auth.routes.forget-password.name', 'auth.forget-password')
);
