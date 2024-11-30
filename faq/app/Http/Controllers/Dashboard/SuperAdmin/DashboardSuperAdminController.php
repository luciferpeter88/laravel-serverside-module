<?php

namespace App\Http\Controllers\Dashboard\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardSuperAdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Dashboard page
    }
    public function allaregisteredmembers()
    {
        $users = User::all(); 
        return view('dashboard.allaregisteredmembers',compact('users')); // All registered members page
    }
    public function addadmin()
    {
        return view('dashboard.addadmin'); // Add admin page
    }
    public function destroy($id)
    {
        // Delete the user with the given id
        $post = Post::findOrFail($id);
            // Delete the related comments first
        $post->comments()->delete();

        // Delete the post itself
        $post->delete();
        return redirect()->route('dashboard.allpost')->with('success', 'User deleted successfully');
    }

    public function deleteuser($id)
    {
        // Delete the user with the given id
        $user = User::findOrFail($id);
        // delete the user and all their posts, comments.
        $user->delete();
        return redirect()->route('dashboard.allusers')->with('success', 'User deleted successfully');
    }
}
