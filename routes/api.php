<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\DateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para las citas
Route::get('/dates', [DateController::class, 'index']);
Route::get('/dates/{id}', [DateController::class, 'show']);
Route::post('/dates', [DateController::class, 'store']);
Route::put('/dates/{id}', [DateController::class, 'update']);
Route::delete('/dates/{id}', [DateController::class, 'destroy']);

// Rutas para los doctores
Route::get('/doctors', [DoctorInfoController::class, 'index']);
Route::get('/doctors/{id}', [DoctorInfoController::class, 'show']);
Route::post('/doctors', [DoctorInfoController::class, 'store']);
Route::put('/doctors/{id}', [DoctorInfoController::class, 'update']);
Route::delete('/doctors/{id}', [DoctorInfoController::class, 'destroy']);

// Rutas de horario protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('schedules', [ScheduleController::class, 'index']); // Obtener todos los horarios del usuario autenticado
    Route::post('schedules', [ScheduleController::class, 'store']); // Crear un nuevo horario
    Route::get('schedules/{user_id}', [ScheduleController::class, 'show']); // Mostrar un horario específico del usuario autenticado
    Route::put('schedules/{user_id}', [ScheduleController::class, 'update']); // Actualizar un horario específico del usuario autenticado
    Route::delete('schedules/{user_id}', [ScheduleController::class, 'destroy']); // Eliminar un horario específico del usuario autenticado
});

// Rutas para las facturas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::post('invoices', [InvoiceController::class, 'store']); // Crear una nueva factura
    Route::get('invoices', [InvoiceController::class, 'index']); // Obtener todas las facturas
    Route::get('invoices/{id}', [InvoiceController::class, 'show']); // Obtener una factura específica
    Route::post('invoices/{id}/generate-signature', [InvoiceController::class, 'generateSignature']); // Generar firma electrónica para una factura
});

// Rutas de autenticación
Route::post('register', [AuthController::class, 'register']); // Registro de usuario
Route::post('login', [AuthController::class, 'login']); // Login de usuario
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Logout de usuario (revocar token)

// Rutas para las especialidades
Route::get('specialties', [SpecialtyController::class, 'index']);
Route::post('specialties', [SpecialtyController::class, 'store']);
Route::get('specialties/{id}', [SpecialtyController::class, 'show']);
Route::put('specialties/{id}', [SpecialtyController::class, 'update']);
Route::delete('specialties/{id}', [SpecialtyController::class, 'destroy']);

// Rutas para los usuarios
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

