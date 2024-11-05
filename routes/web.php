<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class)->middleware('auth');

Route::get('/', function () {
    return view('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Product management routes
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
