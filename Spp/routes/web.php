<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// La ruta raíz ahora apunta a la vista 'layouts.pagina-inicio'
Route::get('/', function () {
    return view('layouts.pagina-inicio');
})->name('welcome');

Auth::routes();

// Esta ruta redirige /home a la ruta raíz si un usuario se loguea
Route::get('/home', function () {
    return redirect()->route('welcome');
});
