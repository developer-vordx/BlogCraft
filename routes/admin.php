<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;


// Group all admin routes with 'admin' prefix and middleware
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth', 'admin'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Tenants
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
});
