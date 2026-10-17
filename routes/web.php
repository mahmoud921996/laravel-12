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
// Route::resource('blog', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('tags', TagController::class);

Route::middleware('auth')->group(function () {
    Route::middleware('role:editor,admin')->group(function () {
        Route::get('/blog/create', [PostController::class, 'create']);
        Route::middleware('can:update,post')->group(function () {
            Route::get('/blog/{post}/edit', [PostController::class, 'edit']);

            Route::put('/blog/{post}', [PostController::class, 'update']);
        });
        Route::post('/blog', [PostController::class, 'store']);

    });
    Route::middleware('role:admin')->group(function () {

        Route::delete('/blog/{id}', [PostController::class, 'destroy']);
    });
    Route::middleware('role:viewer,editor,admin')->group(function () {
        Route::get('/blog', [PostController::class, 'index']);
        Route::get('/blog/{id}', [PostController::class, 'show']);
    });



});

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('register');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);