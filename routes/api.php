<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;

// Rutas públicas (sin autenticación)
Route::middleware('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']); // Listar publicaciones
    Route::post('/posts', [PostController::class, 'create']); // Crear publicación
});

// Rutas protegidas por `auth:sanctum`
Route::middleware('auth:sanctum')->group(function () {
    // Rutas para eventos
    Route::get('/events', [EventController::class, 'index']); // Listar eventos
    Route::post('/events', [EventController::class, 'store']); // Crear evento
    Route::post('/events/{id}/join', [EventController::class, 'join']); // Unirse a un evento

    // Rutas para perfil
    Route::get('/profile/{id}', [ProfileController::class, 'show']); // Ver perfil
    Route::post('/profile/update', [ProfileController::class, 'update']); // Actualizar perfil
});
