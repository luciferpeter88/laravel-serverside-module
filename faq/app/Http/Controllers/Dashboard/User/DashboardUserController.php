<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;

class DashboardUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        $user = auth()->user();
        // Get the total number of posts created by the user
        $postCount = Post::where('user_id', $user->id)->count();

        return view('dashboard.profile', compact('user', 'postCount')); // Profile page
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
        $myposts = Post::where('user_id', auth()->id())->get();
        return view('dashboard.posts',compact('myposts')); // Posts page
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
        ], [
            'profilePicturePath.required' => 'Please upload a profile picture.',
            'profilePicturePath.image' => 'The uploaded file must be an image.',
            'profilePicturePath.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg, gif, svg.',
            'profilePicturePath.max' => 'The profile picture must not exceed 2MB.',
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
    public function updateBackgroundPicture(Request $request)
    {
        $request->validate([
            'backgroundPicturePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'backgroundPicturePath.required' => 'Please upload a background picture.',
            'backgroundPicturePath.image' => 'The uploaded file must be an image.',
            'backgroundPicturePath.mimes' => 'The background picture must be a file of type: jpeg, png, jpg, gif, svg.',
            'backgroundPicturePath.max' => 'The background picture must not exceed 2MB.',
        ]);
    
        $user = auth()->user();
    
        // Delete the old background picture if it exists
        if ($user->backgroundPicturePath && file_exists(public_path('storage/' . $user->backgroundPicturePath))) {
            unlink(public_path('storage/' . $user->backgroundPicturePath));
        }
    
        // Store the new background picture
        $backgroundPicture = $request->file('backgroundPicturePath');
        $backgroundPicturePath = $backgroundPicture->store('background_pictures', 'public'); // Use a meaningful folder name
    
        // Update the user's background picture in the database
        $user->update([
            'backgroundPicturePath' => $backgroundPicturePath,
        ]);
    
        return redirect()->route('dashboard.profile')->with('success', 'Background picture updated successfully!');
    }

    public function createpost()
    {
        $categories = Category::all();
        return view('dashboard.addpost', compact('categories')); // Add post page
    }
public function storepost(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required|string',
    ], [
        'title.required' => 'Title is required.',
        'title.string' => 'Title must be a valid string.',
        'title.max' => 'Title must not exceed 255 characters.',
        'category_id.required' => 'Category is required.',
        'category_id.exists' => 'The selected category is invalid',
        'content.required' => 'Content is required.',
        'content.string' => 'Content must be a valid string.',
    ]);
    // Create a new post, associating it with the currently authenticated user
    // user_id is the foreign key in the posts table
    // category_id is the foreign key in the posts table
    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' =>  auth()->id(), 
        'category_id' => $request->category_id,
    ]);
    return redirect()->route('dashboard.addpost')->with('success', 'Post created successfully!');
}
}
