<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;

Route::middleware('api')->get('/posts', [PostController::class, 'index']);
Route::middleware('api')->post('/posts', [PostController::class, 'create']);
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    
});
