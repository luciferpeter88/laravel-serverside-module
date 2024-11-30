<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Dashboard\User\DashboardUserController;
use App\Http\Controllers\Dashboard\Admin\DashboardAdminController;
use App\Http\Controllers\Dashboard\SuperAdmin\DashboardSuperAdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;




Route::get('/', [WelcomeController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('post.singlepost');
Route::get('/posts/{category}/{pagenum}', [CategoryPageController::class, 'show']);

Route::middleware(['role:user'])->group(function () {
    // Create a comment
    Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

    // Edit a comment
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');

    // Update a comment
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');

    // Delete a comment
    // Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

});

Route::middleware(['role:user,admin,superadmin'])->group(function () {
    // Create a post
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

});

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
        Route::post('settings/backgroundpicture', [DashboardUserController::class, 'updateBackgroundPicture'])->name('dashboard.settings.backgroundpicture');
        // end of settings
        Route::get('/addpost', [DashboardUserController::class, 'createpost'])->name('dashboard.addpost');
        Route::post('/addpost', [DashboardUserController::class, 'storepost'])->name('dashboard.storepost');
    });

    // Routes for 'admin' role
    Route::middleware(['role:admin'])->group(function () {
        // Route::get('/allpost', [DashboardAdminController::class, 'allpost'])->name('dashboard.allpost');
        Route::get('/addcategory', [DashboardAdminController::class, 'addcategory'])->name('dashboard.addcategory');
        Route::get('/allusers', [DashboardAdminController::class, 'allusers'])->name('dashboard.allusers');
    });

    // Routes for 'superadmin' role
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/allaregisteredmembers', [DashboardSuperAdminController::class, 'allaregisteredmembers'])->name('dashboard.allaregisteredmembers');
        Route::delete('/users/{user}', [DashboardSuperAdminController::class, 'deleteuser'])->name('dashboard.users.destroy');
        Route::get('/addadmin', [DashboardSuperAdminController::class, 'addadmin'])->name('dashboard.addadmin');
        Route::post('/addadmin', [DashboardSuperAdminController::class, 'storeadmin'])->name('dashboard.storeadmin');
        Route::delete('/posts/{post}', [DashboardSuperAdminController::class, 'destroy'])->name('post.destroy');
    });


    // Shared routes can go here
    Route::middleware(['role:admin,superadmin'])->group(function () {
        Route::get('/allpost', [DashboardAdminController::class, 'allpost'])->name('dashboard.allpost');
    });

});

