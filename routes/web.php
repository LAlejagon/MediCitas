<?php
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el login y otros recursos de API
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
