<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function show($id)
    {
        // Fetch the post by its ID along with related comments and their users
        $post = Post::with(['comments.user'])->findOrFail($id);

        // Pass the post and its comments to the view
        return view('post.singlepost', compact('post'));
    }
    public function store(Request $request, $postId)
    {
        // Validate the comment content
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Find the post by ID
        $post = Post::findOrFail($postId);

        // Create the comment
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(), // Assumes user is logged in
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
