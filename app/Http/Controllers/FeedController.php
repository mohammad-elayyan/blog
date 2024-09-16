<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $followingsIds = $user->followings()->pluck('user_id');

        $posts = Post::whereIn('user_id', $followingsIds)->latest();
        $posts = $posts->paginate(10);

        return view('dashboard', compact('posts'));
    }
}
