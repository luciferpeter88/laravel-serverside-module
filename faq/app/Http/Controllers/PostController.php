<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($id)
    {
        // Fetch the post by its ID along with related comments and their users
        $post = Post::with(['comments.user'])->findOrFail($id);

        // Pass the post and its comments to the view
        return view('post.singlepost', compact('post'));
    }
}
