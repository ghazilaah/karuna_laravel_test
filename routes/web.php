<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('welcome');
// });

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('products', ProductController::class);
