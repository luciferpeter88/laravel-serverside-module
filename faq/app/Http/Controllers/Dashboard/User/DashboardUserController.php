<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        $user = auth()->user();
        return view('dashboard.profile', compact('user')); // Profile page
    }

    public function posts()
    {// Dummy data
        $questions = [
            [
                'id' => 1,
                'title' => 'How to learn Laravel?',
                'category' => 'Programming',
                'user' => 'John Doe',
                'created_at' => now()->subMinutes(5)->diffForHumans(),
                'answers' => 3,
            ],
            [
                'id' => 2,
                'title' => 'What is TailwindCSS?',
                'category' => 'Frontend',
                'user' => 'Jane Doe',
                'created_at' => now()->subHours(1)->diffForHumans(),
                'answers' => 5,
            ],
            [
                'id' => 3,
                'title' => 'How to set up Laravel routing?',
                'category' => 'Backend',
                'user' => 'Developer123',
                'created_at' => now()->subDays(2)->diffForHumans(),
                'answers' => 7,
            ],
        ];
        return view('dashboard.posts',compact('questions')); // Posts page
    }

    public function settings()
    {
        $user = auth()->user(); // Get the currently authenticated user
        return view('dashboard.settings', compact('user')); // Settings page
    }
    public function updateSettings(Request $request)
    {
        
        $validatedData = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore(auth()->id()), // Ignore the current user for unique validation
            ],
            'bio' => 'nullable|string|max:1000', 
            'name' => 'required|string|max:255', 
        ], [
            // Custom error messages
            'username.required' => 'Username is required.',
            'username.unique' => 'This username is already taken.',
            'bio.string' => 'Bio must be a valid string.',
            'name.required' => 'Name is required.',
        ]);
    
        // Get the currently logged-in user
        $user = auth()->user();
    
        // Update the user's details
        $user->update($validatedData);
        return redirect()->route('dashboard.settings')->with('success', 'Settings updated successfully!');
    }
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profilePicturePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = auth()->user();
    
        // Delete the old profile picture if it exists
        if ($user->profilePicturePath && file_exists(public_path('storage/' . $user->profilePicturePath))) {
            unlink(public_path('storage/' . $user->profilePicturePath));
        }
    
        // Store the new profile picture
        $profilePicture = $request->file('profilePicturePath');
        $profilePicturePath = $profilePicture->store('profile_pictures', 'public'); // Use a meaningful folder name
    
        // Update the user's profile picture in the database
        $user->update([
            'profilePicturePath' => $profilePicturePath,
        ]);
    
        return redirect()->route('dashboard.settings')->with('success', 'Profile picture updated successfully!');
    }
    public function addpost()
    {
        return view('dashboard.addpost'); // Add post page
    }
}
