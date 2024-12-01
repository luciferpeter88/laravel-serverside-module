<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
class DashboardAdminController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allpost()
    {
        $posts = Post::all();
        $posts = Post::withCount('comments')
                 ->get();
        return view('dashboard.allpost', compact('posts')); // All post page
    }
    public function addcategory()
    {        
        $categories = Category::all();

        return view('dashboard.addcategory', compact('categories')); // Add category page
    }
    public function allusers()
    {
        return view('dashboard.allusers'); // All users page
    }
}
