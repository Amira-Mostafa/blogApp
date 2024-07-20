<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/showPost/{id}', [PostController::class, 'show'])->name('showPost');
Route::get('/search', [PostController::class, 'search'])->name('search');

Route::middleware('customAuth')->group(function () {
    Route::get('/myPosts', [PostController::class, 'index'])->name('myPosts');
    Route::get('/createPost', [PostController::class, 'create'])->name('createPost');
    Route::post('/storePost', [PostController::class, 'store'])->name('storePost');
    Route::get('/editPost/{id}', [PostController::class, 'edit'])->name('editPost');
    Route::put('/updatePost/{id}', [PostController::class, 'update'])->name('updatePost');
    Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');
    Route::post('/storeComment/{postId}', [App\Http\Controllers\CommentController::class, 'store'])->name('storeComment');
});
