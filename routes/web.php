<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('officers', OfficerController::class);
Route::resource('dues-categories', DuesCategoryController::class);
Route::resource('dues-members', DuesMemberController::class);
Route::resource('payments', PaymentController::class);
