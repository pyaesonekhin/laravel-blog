<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;


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

// Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/categories/{id}/edit/', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::resource('category', CategoryController::class);

// Route::get('file/create', function() {
//     Storage::disk('public')->put('my_dir/a.txt', 'some text');
// });

// Route::get('file/read', function() {
//     return Storage::disk('public')->get('my_dir/a.txt');
// });

// Route::get('file/delete', function() {
//     Storage::disk('public')->delete('my_dir/a.txt');
// });


































