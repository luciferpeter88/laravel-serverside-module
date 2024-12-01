<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class WelcomeController extends Controller
{
    public function index()
    {
     
        $categories = Category::all();
        $categories = Category::withCount('posts')->get(); // Include post counts
        // get the 5 most recent posts
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        // get the number of comments for each post
        $recentPosts = Post::withCount('comments')->get();        
        // Pass data to the welcome view
        return view('welcome', compact('recentPosts', 'categories'));
    }
}
