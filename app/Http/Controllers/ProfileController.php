<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show($user_id)
    {
        $profile = Profile::where('user_id', $user_id)->firstOrFail();
        return response()->json($profile);
    }

    public function showAuthenticated(Request $request)
    {
        return response()->json([
            'username' => $request->user()->name,
            'email' => $request->user()->email
        ]);
    }   

    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }

            $profile = Profile::where('user_id', $user->id)->firstOrCreate(
                ['user_id' => $user->id], 
                [
                    'username' => $user->name,
                    'avatar' => '/default-avatar.png',
                    'bio' => 'Ingresa tu bio.',
                    'posts_count' => 0,
                    'events_joined' => 0,
                    'achievements' => json_encode([]),
                ]
            );
            $validatedData = $request->validate([
                'username' => 'nullable|string|max:255',
            'avatar' => 'nullable|string',
            'bio' => 'nullable|string',
            'achievements' => 'nullable|array', 
            'posts_count' => 'nullable|integer|min:0',
            'events_joined' => 'nullable|integer|min:0',
            ]);

            $validatedData['achievements'] = json_encode($validatedData['achievements']?? []);

            $profile->update($validatedData);

            return response()->json([
                'message' => 'Perfil actualizado con éxito',
                'profile' => $profile
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al actualizar perfil: ' . $e->getMessage());
            return response()->json([
                'error' => 'Error interno del servidor',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
