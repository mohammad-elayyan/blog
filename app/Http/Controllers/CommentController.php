<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'content' => $validated['comment']
        ]);
        return redirect()->route('posts.show', $post->id)->with('success', 'posts.comment_added');
    }
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        $editingComment = true;
        $post = Post::where('id', $comment->post_id)->first();
        return view('posts.show', compact('post', 'editingComment'));
    }
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $validated = $request->validated();
        $comment->update($validated);
        return redirect()->route('posts.show', $comment->post_id)->with('success', 'posts.comment_updated');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)->with('success',  __('posts.comment_deleted'));
    }
}
