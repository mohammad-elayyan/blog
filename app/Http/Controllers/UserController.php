<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $posts = $user->likes()->paginate(5);
        return view('users.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $editingProf = true;
        $posts = $user->posts()->paginate(5);
        return view('users.show', compact('user', 'editingProf', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $validated = $request->validated();

        if ($request->has('image')) { // == request('image')
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            $user->image && Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);

        return redirect()->route('users.show', $user->id)->with('success', 'Profile updated successfully');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
