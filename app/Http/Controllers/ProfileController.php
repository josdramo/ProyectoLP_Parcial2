<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($user_id)
    {
        $profile = Profile::where('user_id', $user_id)->firstOrFail();
        return response()->json($profile);
    }

    const STRING_NULLABLE = 'string|nullable';

    public function update(Request $request, $user_id)
    {
        $profile = Profile::where('user_id', $user_id)->firstOrFail();

        $validatedData = $request->validate([
            'username' => 'string|max:255',
            'avatar' => self::STRING_NULLABLE,
            'bio' => self::STRING_NULLABLE,
            'posts_count' => 'integer|min:0',
            'events_joined' => 'integer|min:0',
            'achievements' => self::STRING_NULLABLE,
        ]);

        $profile->update($validatedData);

        return response()->json(['message' => 'Perfil actualizado con éxito', 'profile' => $profile]);
    }
    public function showAuthenticated(Request $request)
{
    return response()->json([
        'username' => $request->user()->name,
        'email' => $request->user()->email
    ]);
}
}
