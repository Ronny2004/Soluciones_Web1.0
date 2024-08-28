<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;

// Ruta para la página principal
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login'); // Redirige al login si no está autenticado
})->name('welcome');

// Genera las rutas de autenticación predefinidas por Laravel
Auth::routes();

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta para la página de inicio después de autenticarse
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas para el recurso "users"
    Route::resource('users', UserController::class);

    // Rutas para el recurso "roles"
    Route::resource('roles', RoleController::class);

    // Rutas para la Gestión de Accesos
    Route::resource('access', AccessController::class);

    // Ruta para el logout (cerrar sesión)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Rutas para la recuperación de contraseña
// Mostrar formulario de solicitud de restablecimiento
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

// Enviar enlace de restablecimiento
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Mostrar el formulario de restablecimiento de contraseña
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

// Actualizar la contraseña
Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');
