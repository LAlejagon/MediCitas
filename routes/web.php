<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/invoices', [InvoiceController::class, 'store']); // Crear factura
Route::get('/invoices', [InvoiceController::class, 'index']); // Listar facturas
Route::get('/invoices/{id}', [InvoiceController::class, 'show']); // Ver una factura específica
Route::post('/invoices/{id}/generate-signature', [InvoiceController::class, 'generateSignature']); // Generar firma


