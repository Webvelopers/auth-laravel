<?php

use Illuminate\Support\Facades\Route;
use Webvelopers\Auth\Http\Controllers\SignInController;
use Webvelopers\Auth\Http\Controllers\SignUpController;
use Webvelopers\Auth\Http\Controllers\ForgetPasswordController;

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
