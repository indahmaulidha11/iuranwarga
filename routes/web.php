<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\PaymentController;

// Halaman utama
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

// ROUTE UNTUK WARGA
Route::middleware(['warga'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('warga.dashboard');
    Route::resource('dues-members', DuesMemberController::class);
    Route::resource('payments', PaymentController::class);
    Route::get('/member/logout', [UserController::class, 'logoutmember'])->name('member.logout');
});

// ROUTE UNTUK ADMIN
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('officers', OfficerController::class);
    Route::resource('dues-categories', DuesCategoryController::class);
    Route::resource('dues-members', DuesMemberController::class)->only(['index']);
    Route::resource('payments', PaymentController::class)->only(['index']);
    Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
});
