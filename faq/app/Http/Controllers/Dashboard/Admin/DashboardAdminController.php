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
    public function storecategory(Request $request)
    {
       // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ], [
            // Custom error messages
            'name.required' => 'Title is required.',
            'name.string' => 'Title must be a valid string.',
            'name.max' => 'Title cannot exceed 255 characters.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a valid string.',
            'description.max' => 'Description cannot exceed 1000 characters.',
        ]);

        // Create a new category
        Category::create($validatedData);

    return redirect()->back()->with('success', 'Category added successfully.');
    }




    public function allusers()
    {
        return view('dashboard.allusers'); // All users page
    }
}
