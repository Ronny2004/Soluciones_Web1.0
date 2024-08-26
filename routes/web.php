<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); // Opcional, pero ayuda a hacer referencia a la ruta en las vistas

// Rutas para el recurso "users"
// La siguiente línea genera automáticamente las rutas CRUD para el recurso "users"
Route::resource('users', UserController::class);
