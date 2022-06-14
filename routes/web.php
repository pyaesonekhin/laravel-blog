<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/update/{id}', [PostController::class, 'update']);
Route::get('/posts/show/{id}', [PostController::class, 'show']);
Route::get('/posts/delete/{id}', [PostController::class, 'destroy']);