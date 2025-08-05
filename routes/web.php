<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('halaman');
});

Route::resource('users', UserController::class);
Route::resource('officers', OfficerController::class);
Route::resource('dues-categories', DuesCategoryController::class);
Route::resource('dues-members', DuesMemberController::class);
Route::resource('payments', PaymentController::class);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Resource user (hanya bisa diakses setelah login)
Route::resource('users', UserController::class)->middleware('auth');
