<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth/login', function () {
    return view('webvelopers-auth::auth.login');
});

Route::post('/auth/login', function () {
    return view('webvelopers-auth::auth.login');
})->name('login');

Route::get('/auth/register', function () {
    return view('webvelopers-auth::auth.register');
});

Route::post('/auth/register', function () {
    return view('webvelopers-auth::auth.register');
})->name('register');
