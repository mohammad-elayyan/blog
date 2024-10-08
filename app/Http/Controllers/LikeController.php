<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = auth()->user();
        $liker->likes()->attach($post);
        return redirect()->route('dashboard');
    }
    public function dislike(Post $post)
    {
        $liker = auth()->user();
        $liker->likes()->detach($post);
        return redirect()->route('dashboard');
    }
}
