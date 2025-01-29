<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     // Método para obtener todas las publicaciones
     public function index()
     {
         // Recuperar todas las publicaciones y devolverlas como respuesta JSON
         return response()->json(Post::all(), 200);
     }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Permitir cualquier tipo de imagen
        ]);
    
        $post = new Post();
        $post->content = $validated['content'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName(); // Crear un nombre único para la imagen
            $image->storeAs('public/posts', $imageName); // Guardar en el directorio adecuado
            $post->image = $imageName;
        }
    
        $post->save();
        return response()->json($post, 201);
    }
    
}
