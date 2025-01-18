<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('api')->get('/posts', [PostController::class, 'index']);
Route::middleware('api')->post('/posts', [PostController::class, 'create']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
});
