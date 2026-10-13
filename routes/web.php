<?php

use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/job', [JobController::class, 'index']);
// Route::resource('blog', PostController::class)->except(['destroy']);
// Route::resource('blog', PostController::class)->only(['index']);
Route::resource('blog', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('tags', TagController::class);


Route::get('/signup', [AuthController::class, 'showSignUp'])->name('register');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);