<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;


Route::view('/', 'landing')->name('landing');


Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');
Route::view('/verify-email', 'auth.verify-email')->name('verification.notice');



Route::post('/register', [AuthController::class, 'register'])->name('submit.register');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::post('/login', [AuthController::class, 'login'])->name('submit.login');

Route::post('/email-verify',[VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/verification/send', [VerificationController::class, 'send'])->name('verification.send');



Route::get('/create-tenant/{name}', function ($name) {
    $domain = strtolower($name);

    $tenant = Tenant::create([
        'name' => ucfirst($name),
        'slug' => $domain,
    ]);

    return "Tenant '{$tenant->name}' created. Visit: http://{$tenant->domain}.app.test/posts";
});

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my/posts', [PostController::class, 'myPosts'])->name('posts.mine');

    Route::prefix('posts')->name('posts.')->group(function () {
        // GET /posts → index
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{post}', [PostController::class, 'show'])->name('show')->middleware('count.post.view');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::post('/{post}/update', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}/delete', [PostController::class, 'destroy'])->name('destroy');
        Route::post('/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');

    });

    Route::resource('categories', CategoryController::class);

});

