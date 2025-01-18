<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use App\Services\FollowService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;
    protected $followService;

    public function __construct(ProfileService $profileService, FollowService $followService)
    {
        $this->profileService = $profileService;
        $this->followService = $followService;
    }

    public function show()
    {
        return response()->json($this->profileService->getProfile());
    }

    public function update(Request $request)
    {
        return response()->json($this->profileService->updateProfile($request->all()));
    }

    public function changePassword(Request $request)
    {
        return response()->json($this->profileService->changePassword($request->current_password, $request->new_password));
    }

    public function deleteAccount()
    {
        return response()->json($this->profileService->deleteAccount());
    }

    public function follow($id)
    {
        return response()->json($this->followService->followUser($id));
    }

    public function unfollow($id)
    {
        return response()->json($this->followService->unfollowUser($id));
    }

    public function followers()
    {
        return response()->json($this->followService->getFollowers());
    }

    public function following()
    {
        return response()->json($this->followService->getFollowing());
    }
}
