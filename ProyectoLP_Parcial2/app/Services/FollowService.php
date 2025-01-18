<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowService
{
    public function followUser($userId)
    {
        $user = Auth::user();
        $targetUser = User::findOrFail($userId);

        if ($user->id === $targetUser->id) {
            return ['error' => 'No puedes seguirte a ti mismo'];
        }

        $user->following()->attach($targetUser->id);

        return ['message' => "Ahora sigues a {$targetUser->name}"];
    }

    public function unfollowUser($userId)
    {
        $user = Auth::user();
        $targetUser = User::findOrFail($userId);

        $user->following()->detach($targetUser->id);

        return ['message' => "Has dejado de seguir a {$targetUser->name}"];
    }

    public function getFollowers()
    {
        return Auth::user()->followers;
    }

    public function getFollowing()
    {
        return Auth::user()->following;
    }
}
