<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Dashboard route (now redirects to posts)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
Auth::routes();


Route::get('/posts/download', [PostController::class, 'downloadPDF'])->name('posts.download');
// Home route (optional if not used)
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');



// Resource route for posts
Route::resource('/posts', PostController::class)->middleware('auth');
