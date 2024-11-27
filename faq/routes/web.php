<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;




Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();



Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware(['role:user'])->group(function () {
        Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    });
    // Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::middleware(['role:user'])->group(function () {
        Route::get('/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');
    });
    // Route::get('/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');
    // Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::middleware(['role:user'])->group(function () {
        Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    });
    Route::middleware(['role:user'])->group(function () {
        Route::get('/addpost', [DashboardController::class, 'addpost'])->name('dashboard.addpost');
    });
    // admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/allpost', [DashboardController::class, 'allpost'])->name('dashboard.allpost');
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/addcategory', [DashboardController::class, 'addcategory'])->name('dashboard.addcategory');
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/allusers', [DashboardController::class, 'allusers'])->name('dashboard.allusers');
    });


    // superadmin
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/allaregisteredmembers', [DashboardController::class, 'allaregisteredmembers'])->name('dashboard.allaregisteredmembers');
    });
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/addadmin', [DashboardController::class, 'addadmin'])->name('dashboard.addadmin');
    });
    // shared
    
});

