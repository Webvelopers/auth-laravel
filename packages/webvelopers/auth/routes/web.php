<?php

use Illuminate\Support\Facades\Route;
use Webvelopers\Auth\Http\Controllers\SignInController;
use Webvelopers\Auth\Http\Controllers\SignUpController;
use Webvelopers\Auth\Http\Controllers\ForgetPasswordController;

Route::get('/home', function () {
    return redirect(config('webvelopers-auth.routes.home', '/'));
})->name('home');

Route::get('/auth/sign-in', [SignInController::class, 'create'])->name('sign-in.create');
Route::post('/auth/sign-in', [SignInController::class, 'store'])->name('sign-in.store');
Route::get('/auth/sign-up', [SignUpController::class, 'create'])->name('sign-up.create');
Route::post('/auth/sign-up', [SignUpController::class, 'store'])->name('sign-up.store');
Route::get('/auth/forget-password', [ForgetPasswordController::class, 'create'])->name('forget-password.create');
Route::post('/auth/forget-password', [ForgetPasswordController::class, 'store'])->name('forget-password.store');
