<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\OfficerController;
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

    Route::get('/officers', [OfficerController::class, 'index'])->name('officers');
    Route::get('/officers/create', [OfficerController::class, 'create'])->name('officers.create');
    Route::post('/officers', [OfficerController::class, 'store'])->name('officers.store');
    Route::get('/officers/{id}/edit', [OfficerController::class, 'edit'])->name('officers.edit');
    Route::put('/officers/{id}', [OfficerController::class, 'update'])->name('officers.update');
    Route::delete('/officers/{id}', [OfficerController::class, 'destroy'])->name('officers.destroy');

    Route::get('/categori', [DuesCategoryController::class, 'index'])->name('dues.categori');
    Route::get('/create-categori', [DuesCategoryController::class, 'create'])->name('categori.create');
    Route::post('/categori', [DuesCategoryController::class, 'store'])->name('categori.store');
    Route::delete('/categori/{id}', [DuesCategoryController::class, 'destroy'])->name('categori.destroy');
    Route::get('/categori/{id}/edit', [DuesCategoryController::class, 'edit'])->name('categori.edit');
    Route::put('/categori/{id}', [DuesCategoryController::class, 'update'])->name('categori.update');




    Route::get('/dues/members', [DuesMemberController::class, 'index'])->name('dues.members');
    Route::get('/dues/members/create', [DuesMemberController::class, 'create'])->name('dues.members.create');
    Route::post('/dues/members', [DuesMemberController::class, 'store'])->name('dues.members.store');
    Route::get('/dues/members/{id}/edit', [DuesMemberController::class, 'edit'])->name('dues.members.edit');
    Route::put('/dues/members/{id}', [DuesMemberController::class, 'update'])->name('dues.members.update');
    Route::delete('/dues/members/{id}', [DuesMemberController::class, 'destroy'])->name('dues.members.destroy');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('/payment/{id}/confirm', [PaymentController::class, 'confirmConfirmation'])->name('payment.confirm');
    Route::post('/payment/{id}', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');


});



// ROUTE UNTUK ADMIN
Route::middleware(['warga'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'warga'])->name('warga.dashboard');
    Route::get('/dues-member', [DuesMemberController::class, 'index'])->name('admin.duesM');
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payment');
    Route::get('/warga/logout', [UserController::class, 'logoutwarga'])->name('warga.logout');
});
