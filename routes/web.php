<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorSpecialtyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;  // Asegúrate de añadir esta línea
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Rutas para el registro y login de pacientes
Route::get('/register-patient', [RegisterController::class, 'showPatientRegistrationForm'])->name('register.patient');
Route::post('/register-patient', [RegisterController::class, 'registerPatient']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rutas para el registro y login de administradores, doctores y secretarias
Route::get('/register-user', [AdminController::class, 'showUserRegistrationForm'])->name('admin.register-user-form');
Route::post('/register-user', [AdminController::class, 'registerUser'])->name('admin.register-user');

// ... otras rutas

// Rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    // ... rutas autenticadas
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // ... otras rutas autenticadas
});

// Generamos las rutas de autenticación, excepto las de registro
Auth::routes(['register' => false]);




