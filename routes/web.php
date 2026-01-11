<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\auth\AauthController;

Route::get('/', function () {
    if (session('authenticated')) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AauthController::class, 'login'])->name('login');
Route::post('/login', [AauthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AauthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/{id}/view', [StudentController::class, 'view'])->name('students.view');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});
