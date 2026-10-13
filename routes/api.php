<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


// Route::post("/blog", [PostController::class, "create"]);
// Route::delete("/blog/{id}", [PostController::class, "delete"]);
// Route::get("/comments", [CommentController::class, "create"]);
// Route::get("/tags", [TagController::class, "create"]);


Route::apiResource("post", PostApiController::class);


Route::prefix("auth")->group(function () {
  Route::post("login", [AuthController::class, 'login']);
  Route::middleware(['auth:api'])->group(function () {
    Route::post("refresh", [AuthController::class, "refresh"]);
    Route::get("me", [AuthController::class, "me"]);
    Route::post("logout", [AuthController::class, "logout"]);
  });
});
