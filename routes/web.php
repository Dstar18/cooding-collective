<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\AuthController;

Route::middleware('BasicAuth')->group(function () {
    Route::get('/token-csrf', [AuthController::class, 'getTokenCSRF'])->name('token-csrf');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['BasicAuth', 'CheckLogin'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    
    Route::post('/user-account/update/{id}', [UserAccountController::class, 'update'])->name('user.update');
    Route::get('/user-account/{id}', [UserAccountController::class, 'show'])->name('user.show');
});

Route::get('/', function () {
    return view('welcome');
});
