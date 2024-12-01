<?php

namespace App\Http\Controllers\Dashboard\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardSuperAdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Dashboard page
    }
    public function allaregisteredmembers()
    {
        $users = User::all(); 
        return view('dashboard.superadmin.allaregisteredmembers',compact('users')); // All registered members page
    }
    public function addadmin()
    {
        return view('dashboard.superadmin.addadmin'); // Add admin page
    }
        public function storeadmin(Request $request)
        {
        // Validate the request with custom error messages
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            // Custom error messages
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a valid string.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        // Create a new admin user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'admin', // Assign admin role
        ]);
            return redirect()->back()->with('success', 'New admin added successfully.');
        }
    public function destroy($id)
    {
        // Delete the user with the given id
        $post = Post::findOrFail($id);
            // Delete the related comments first
        $post->comments()->delete();

        // Delete the post itself
        $post->delete();
        return redirect()->route('dashboard.allpost')->with('success', 'Post deleted successfully');
    }

    public function deleteuser($id)
    {
        // Delete the user with the given id
        $user = User::findOrFail($id);
        // Check if the user is trying to delete their own account
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }
        // delete the user and all their posts, comments.
        $user->delete();
        if(auth()->user()->role == 'admin'){
            return redirect()->route('dashboard.allusers')->with('success', 'User deleted successfully');
        }
        return redirect()->route('dashboard.allaregisteredmembers')->with('success', 'User deleted successfully');
    }
}
