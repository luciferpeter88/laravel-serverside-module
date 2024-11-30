<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
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
        return view('dashboard.addcategory'); // Add category page
    }
    public function allusers()
    {
        return view('dashboard.allusers'); // All users page
    }
    // public function deleteuser($id)
    // {
    //     // Delete the user with the given id
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('dashboard.allusers')->with('success', 'User deleted successfully');
    // }
}
