<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Lista de publicaciones simuladas
    private $posts = [
        [
            'id' => 1,
            'content' => '¡Hola, gamers! Únanse al próximo torneo de Rocket League.',
            'image_url' => 'https://via.placeholder.com/150',
            'created_at' => '2025-01-17 14:00:00'
        ],
        [
            'id' => 2,
            'content' => '¿Quién más está jugando Elden Ring? Comenten sus logros.',
            'image_url' => 'https://via.placeholder.com/150',
            'created_at' => '2025-01-16 18:30:00'
        ],
    ];

    // Método para crear una publicación
    public function create(Request $request)
    {
        $post = [
            'id' => count($this->posts) + 1,
            'content' => $request->content,
            'image_url' => $request->image_url,
            'created_at' => now(),
        ];

        // Añadir la nueva publicación a la lista simulada
        array_push($this->posts, $post);

        return response()->json($post, 201);
    }

    // Método para obtener las publicaciones
    public function index()
    {
        return response()->json($this->posts);
    }
}

