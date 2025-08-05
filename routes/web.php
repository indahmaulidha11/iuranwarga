<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('halaman');
})->name('home');

// Login & Logout
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Resource routes (hanya untuk user yang login)
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('officers', OfficerController::class);
    Route::resource('dues-categories', DuesCategoryController::class);
    Route::resource('dues-members', DuesMemberController::class);
    Route::resource('payments', PaymentController::class);
});
