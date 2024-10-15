<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\Post\PostEditController;
use App\Http\Controllers\Post\PostStoreController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Post\PostUpdateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', TimelineController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::post('posts', PostStoreController::class)->name('posts.store');
Route::get('posts/{id}/edit', PostEditController::class)->name('posts.edit');
Route::put('posts/{id}', PostUpdateController::class)->name('posts.update');
Route::delete('posts/{id}', PostDeleteController::class)->name('posts.destroy');

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth', 'verified')->name('comments.store');
Route::delete('posts/{post}/comments/{comment}',  [CommentController::class, 'destroy'])->middleware('auth', 'verified')->name('comments.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
