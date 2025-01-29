<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('api')->group(function () {
    Route::get('/posts', [PostController::class, 'index']); 
    Route::post('/posts', [PostController::class, 'store']); 
});

Route::get('/test', function () {
    return response()->json(['message' => 'Ruta funcionando']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/events', [EventController::class, 'index']); // Listar eventos
    Route::post('/events', [EventController::class, 'store']); // Crear evento
    Route::post('/events/{id}/join', [EventController::class, 'join']); // Unirse a evento
    Route::get('/profile/{id}', [ProfileController::class, 'show']); // Ver perfil
    Route::post('/profile/update', [ProfileController::class, 'update']); // Actualizar perfil
    Route::get('/profile', [ProfileController::class, 'showAuthenticated']); // Nueva ruta
});


