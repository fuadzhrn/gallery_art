<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KaryaController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
});

// Protected routes
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Seniman routes
Route::middleware(['auth', 'role:seniman'])->group(function () {
    Route::get('/dashboard-seniman', function () {
        return view('dashboard.seniman');
    })->name('dashboard-seniman');
    
    Route::get('/karya', [KaryaController::class, 'indexSeniman'])->name('karya.seniman');
    Route::get('/karya/upload', [KaryaController::class, 'create'])->name('karya.create');
    Route::post('/karya', [KaryaController::class, 'store'])->name('karya.store');
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard-admin', function () {
        return view('dashboard.admin');
    })->name('dashboard-admin');
    
    Route::get('/karya-management', [KaryaController::class, 'indexAdmin'])->name('karya.admin');
    Route::patch('/karya/{id}/status', [KaryaController::class, 'updateStatus'])->name('karya.updateStatus');
});
