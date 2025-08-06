<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\OfficersController;
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
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/officers', [OfficersController::class, 'index'])->name('officers');
    Route::get('/officers/create', [OfficersController::class, 'create'])->name('officers.create');
    Route::post('/officers', [OfficersController::class, 'store'])->name('officers.store');
    Route::get('/officers/{id}/edit', [OfficersController::class, 'edit'])->name('officers.edit');
    Route::put('/officers/{id}', [OfficersController::class, 'update'])->name('officers.update');
    Route::delete('/officers/{id}', [OfficersController::class, 'destroy'])->name('officers.destroy');

    Route::get('/dues-category', [DuesCategoryController::class, 'index'])->name('admin.duesC');
    Route::get('/dues-member', [DuesMemberController::class, 'index'])->name('admin.duesM');
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payment');
    Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
});


// ROUTE UNTUK ADMIN
Route::middleware(['warga'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'warga'])->name('warga.dashboard');
    Route::get('/dues-member', [DuesMemberController::class, 'index'])->name('admin.duesM');
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payment');
    Route::get('/warga/logout', [UserController::class, 'logoutwarga'])->name('warga.logout');
});
