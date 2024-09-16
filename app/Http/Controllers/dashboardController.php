<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $posts = $posts->where('content', 'like', '%' . request()->input('search', '') . '%');
            return view('dashboard', [
                'posts' => $posts->paginate(5),
            ]);
        }

        $topUsers = User::withCount('posts')
            ->orderBy('posts_count', 'DESC')
            ->limit(5)->get();

        return view('dashboard', [
            'posts' => $posts->paginate(5),
            'topUsers' => $topUsers,
        ]);
    }
}
