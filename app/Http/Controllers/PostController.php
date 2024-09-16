<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $editing = true;
        return view('posts.show', compact('post', 'editing'));
    }

    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        Post::create($validated);

        return redirect()->route('dashboard')->with('success', 'Post created successfully');
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('dashboard')->with('success',  __('posts.post_deleted_successfully'));
    }
}
