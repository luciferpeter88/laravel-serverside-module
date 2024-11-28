<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Dashboard\User\DashboardUserController;
use App\Http\Controllers\Dashboard\Admin\DashboardAdminController;
use App\Http\Controllers\Dashboard\SuperAdmin\DashboardSuperAdminController;
use App\Http\Controllers\Dashboard\DashboardController;




Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();



Route::prefix('dashboard')->group(function () {
    // Routes accessible to all roles
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Routes for 'user' role
    Route::middleware(['role:user'])->group(function () {
        Route::get('/profile', [DashboardUserController::class, 'profile'])->name('dashboard.profile');
        Route::get('/posts', [DashboardUserController::class, 'posts'])->name('dashboard.posts');
        // settings
        Route::get('/settings', [DashboardUserController::class, 'settings'])->name('dashboard.settings');
        Route::post('/settings', [DashboardUserController::class, 'updateSettings'])->name('dashboard.settings.update');
        Route::post('/settings/profilepicture', [DashboardUserController::class, 'updateProfilePicture'])->name('dashboard.settings.profilepicture');
        // end of settings
        Route::get('/addpost', [DashboardUserController::class, 'addpost'])->name('dashboard.addpost');
    });

    // Routes for 'admin' role
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/allpost', [DashboardAdminController::class, 'allpost'])->name('dashboard.allpost');
        Route::get('/addcategory', [DashboardAdminController::class, 'addcategory'])->name('dashboard.addcategory');
        Route::get('/allusers', [DashboardAdminController::class, 'allusers'])->name('dashboard.allusers');
    });

    // Routes for 'superadmin' role
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/allaregisteredmembers', [DashboardSuperAdminController::class, 'allaregisteredmembers'])->name('dashboard.allaregisteredmembers');
        Route::get('/addadmin', [DashboardSuperAdminController::class, 'addadmin'])->name('dashboard.addadmin');
    });

    // Shared routes can go here
});

