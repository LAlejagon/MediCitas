<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\ScheduleController;
use App\Models\DoctorInfo;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\InvoiceController;


Route::get('/', [DashboardController::class, 'index'])->name('index'); 

//Usuarios
Route::get('/createUser', [UserController::class, 'create'])->name('user.create');
Route::post('/storeUser', [UserController::class, 'store'])->name('user.store');
Route::get('/showUser/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/destroyUser/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Especialidades
Route::get('/createSpeciality', [SpecialtyController::class, 'create'])->name('specialty.create');
Route::post('/storeSpeciality', [SpecialtyController::class, 'store'])->name('specialty.store');
Route::get('/showSpeciality/{id}', [SpecialtyController::class, 'show'])->name('specialty.show');
Route::get('/editSpeciality/{id}', [SpecialtyController::class, 'edit'])->name('specialty.edit');
Route::put('/updateSpeciality/{id}', [SpecialtyController::class, 'update'])->name('specialty.update');
Route::delete('/destroySpeciality/{id}', [SpecialtyController::class, 'destroy'])->name('specialty.destroy');

//Info Doctores
Route::get('/createDoctorInfo', [DoctorInfoController::class, 'create'])->name('doctorInfo.create');
Route::post('/storeDoctorInfo', [DoctorInfoController::class, 'store'])->name('doctorInfo.store');
Route::get('/showDoctorInfo/{id}', [DoctorInfoController::class, 'show'])->name('doctorInfo.show');
Route::get('/editDoctorInfo/{id}', [DoctorInfoController::class, 'edit'])->name('doctorInfo.edit');
Route::put('/updateDoctorInfo/{id}', [DoctorInfoController::class, 'update'])->name('doctorInfo.update');
Route::delete('/destroyDoctorInfo/{id}', [DoctorInfoController::class, 'destroy'])->name('doctorInfo.destroy');


// Citas
Route::get('/createDate', [DateController::class, 'create'])->name('date.create');
Route::post('/storeDate', [DateController::class, 'store'])->name('date.store');
Route::get('/showDate/{id}', [DateController::class, 'show'])->name('date.show');
Route::get('/editDate/{id}', [DateController::class, 'edit'])->name('date.edit');
Route::put('/updateDate/{id}', [DateController::class, 'update'])->name('date.update');
Route::delete('/destroyDate/{id}', [DateController::class, 'destroy'])->name('date.destroy');

//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

//Facturas
Route::post('/invoices', [InvoiceController::class, 'store']); // Crear factura
Route::get('/invoices', [InvoiceController::class, 'index']); // Listar facturas
Route::get('/invoices/{id}', [InvoiceController::class, 'show']); // Ver una factura específica
Route::post('/invoices/{id}/generate-signature', [InvoiceController::class, 'generateSignature']); // Generar firma

//Schedule
Route::get('/createSchedule', [ScheduleController::class, 'create'])->name('schedule.create');
Route::post('/storeSchedule', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/showSchedule/{id}', [ScheduleController::class, 'show'])->name('schedule.show');
Route::get('/editSchedule/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::put('/updateSchedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/destroySchedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');