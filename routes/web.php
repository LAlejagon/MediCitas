<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('index'); 
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
Route::post('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [UserController::class, 'update'])->name('update');

