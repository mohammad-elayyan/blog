<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);
        return redirect()->route('users.show', $user)->with('success', 'You followed this user successfully');
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->detach($user);
        return redirect()->route('users.show', $user)->with('success', 'You unfollowed this user successfully');
    }
}
