<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class WelcomeController extends Controller
{
    public function index()
    {
        // Dummy data
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
        $categories = Category::all();

        // Pass data to the welcome view
        return view('welcome', compact('questions', 'categories'));
    }
}
