<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/create', [PostController::class, 'create']);
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{id}/edit/', [PostController::class, 'edit']);
// Route::put('/posts/{id}', [PostController::class, 'update']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);



































