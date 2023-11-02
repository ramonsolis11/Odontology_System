<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorSpecialtyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;



Route::resource('users', UserController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('specialties', SpecialtyController::class);
Route::resource('doctor-specialties', DoctorSpecialtyController::class);
Route::resource('treatments', TreatmentController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('payments', PaymentController::class);
Route::resource('reports', ReportController::class);

