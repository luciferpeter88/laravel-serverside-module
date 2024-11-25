<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard'); // Dashboard page
    }

    public function profile()
    {
        return view('dashboard.profile'); // Profile page
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
        return view('dashboard.settings'); // Settings page
    }

    public function allpost()
    {
        return view('dashboard.allpost'); // All post page
    }
}
