<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return response()->json(Post::all());
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }

        $post = Post::create($validated);
        return response()->json($post, 201);
    }
}
