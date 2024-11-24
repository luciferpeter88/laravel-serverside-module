<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;



Route::get('/', [WelcomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
