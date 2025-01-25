<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;

Route::middleware('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']); // Obtener publicaciones
    Route::post('/posts', [PostController::class, 'store']); // Crear publicación
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/events', [EventController::class, 'index']); // Listar eventos
    Route::post('/events', [EventController::class, 'store']); // Crear evento
    Route::post('/events/{id}/join', [EventController::class, 'join']); // Unirse a evento
    Route::get('/profile/{id}', [ProfileController::class, 'show']); // Ver perfil
    Route::post('/profile/update', [ProfileController::class, 'update']); // Actualizar perfil
});


