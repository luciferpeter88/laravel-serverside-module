<?php

namespace App\Http\Controllers\Dashboard\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardSuperAdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Dashboard page
    }
    public function allaregisteredmembers()
    {
        return view('dashboard.allaregisteredmembers'); // All registered members page
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
}
