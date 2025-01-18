<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class ProfileService
{
    public function getProfile($userId = null)
    {
        return $userId ? User::findOrFail($userId) : Auth::user();
    }

    public function updateProfile($data)
    {
        $user = Auth::user();

        // Validar datos
        $validatedData = validator($data, [
            'name' => 'string|max:255',
            'email' => "email|unique:users,email,{$user->id}",
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ])->validate();

        // Manejo del avatar
        if (isset($data['avatar'])) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $validatedData['avatar'] = $data['avatar']->store('avatars', 'public');
        }

        $user->update($validatedData);

        return $user;
    }

    public function changePassword($currentPassword, $newPassword)
    {
        $user = Auth::user();

        if (!Hash::check($currentPassword, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'La contrasenia actual es incorrecta.']);
        }

        $user->update(['password' => bcrypt($newPassword)]);

        return ['message'=> 'Contrasenia actualizada correctamente'];
    }

    public function deleteAccount()
    {
        $user = Auth::user();

        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return ['message' => 'Cuenta eliminada correctamente'];
    }
}
