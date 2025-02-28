<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;

// Mostrar la apgina de inicio
Route::get('/', function(){
    return view('home');
})->name('home');

// Mostrar el formulario de registro
Route::get('/register', [UserController::class, 'create'])->name('users.create');

// Guardar los datos del usuario
Route::post('/register', [UserController::class, 'store'])->name('users.store');