<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        if ($post->user_id !== auth()->id()) {
            $post->user->notify(new CommentNotification($comment, $post));
        }

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // Show the edit form for a comment
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('post.edit', compact('comment'));
    }

    // Update a comment
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        // Redirect back to the associated post
        return redirect()->route('post.singlepost', ['id' => $comment->post_id])
        ->with('success', 'Comment updated successfully!');
    }
    

    // Delete a comment
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
    
        // Check if the user is the owner of the comment or has a specific role
        if ($comment->user_id !== auth()->id() && !in_array(auth()->user()->role, ['admin', 'superadmin'])) {
            abort(403, 'Unauthorized action.');
        }
    
        $comment->delete();
    
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
    
}
