<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;



Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
