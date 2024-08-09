<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('', fn()=>to_route('post.index'));
Route::get('login', fn()=>to_route('auth.create'))->name('login');
Route::resource('register', RegisterController::class)->only(['create', 'store']);
Route::resource('post', PostController::class)->only(['index', 'show']);
Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::middleware('auth')->group(function(){
Route::resource('profile', MyProfileController::class)->only(['index', 'edit', 'update', 'store']);
Route::resource('my-posts', MyPostController::class);
Route::resource('post.comment', CommentController::class)->only(['store', 'create', 'destroy']);
});