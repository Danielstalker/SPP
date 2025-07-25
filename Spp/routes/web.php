<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth; // ¡IMPORTANTE: Añade esta línea!

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de Login y Logout que ya tienes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ¡AÑADE ESTA LÍNEA PARA LAS RUTAS DE REGISTRO Y OTRAS DE AUTENTICACIÓN!
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});