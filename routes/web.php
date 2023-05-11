<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Homepage
Route::get('/', [PostController::class, 'index']);

// Posts
Route::middleware(['auth', 'verified'])->group(function() {
    // Show create post form
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Store create post data
    Route::post('/posts', [PostController::class, 'store']);

    // Show edit post form
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Update post
    Route::put('/posts/{post}', [PostController::class, 'update']);

    // Delete post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Single post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Tags
// Store tag data
Route::post('/tags', [TagController::class, 'store'])->middleware(['auth', 'verified']);

// Categories
// Store category data
Route::post('/categories', [CategoryController::class, 'store'])->middleware(['auth', 'verified']);
