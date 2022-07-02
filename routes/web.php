<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MyPostController;
use Illuminate\Support\Facades\Route;


// Route::get('welcome/{lang}', function($lang) {
//     if($lang == 'en') {
//         return "English";
//     }
//     if($lang == 'my') {
//         return "Myanmar";
//     }
// })->where('lang', 'en|my');
// Route::view('welcomexxx', 'welcome');


// Route::get('/', [PostController::class, 'index']);

Route::redirect('/', '/posts');

// Route::prefix('posts')->middleware('myauth')->group(function() {
//     Route::get('/', [PostController::class, 'index'])->name('post.index');
//     Route::get('/create', [PostController::class, 'create']);
//     Route::post('', [PostController::class, 'store']);
//     Route::get('/{id}/edit', [PostController::class, 'edit']);
//     Route::put('/{id}', [PostController::class, 'update']);
//     Route::patch('/{id}', [PostController::class, 'update']);
//     Route::get('/{id}', [PostController::class, 'show']);
//     Route::delete('/{id}', [PostController::class, 'destroy']);
// });

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('myauth');
Route::post('/posts', [PostController::class, 'store'])->middleware('myauth');
Route::get('/posts/{id}/edit/', [PostController::class, 'edit'])->middleware('myauth');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('myauth');
Route::patch('/posts/{id}', [PostController::class, 'update']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);


// Route::resource('posts', PostController::class);
// Route::resource('categories', CategoryController::class);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);


Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::get('my-posts', [MyPostController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('myauth');
Route::post('/categories', [CategoryController::class, 'store'])->middleware('myauth');
Route::get('/categories/{id}/edit/', [CategoryController::class, 'edit'])->middleware('myauth');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->middleware('myauth');
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


































