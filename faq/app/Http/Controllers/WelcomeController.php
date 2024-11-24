<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $categories = [
            ['id' => 1, 'name' => 'Programming', 'description' => 'All about coding and development.'],
            ['id' => 2, 'name' => 'Frontend', 'description' => 'HTML, CSS, JavaScript, and UI/UX topics.'],
            ['id' => 3, 'name' => 'Backend', 'description' => 'Server-side programming and APIs.'],
            ['id' => 4, 'name' => 'Databases', 'description' => 'SQL, NoSQL, and database design.'],
            ['id' => 5, 'name' => 'DevOps', 'description' => 'CI/CD, cloud infrastructure, and automation.'],
            ['id' => 6, 'name' => 'Mobile Development', 'description' => 'Building apps for Android, iOS, and more.'],
            ['id' => 7, 'name' => 'Game Development', 'description' => 'Creating games using Unity, Unreal Engine, etc.'],
            ['id' => 8, 'name' => 'Cybersecurity', 'description' => 'Protecting systems and data from cyber threats.'],
            ['id' => 9, 'name' => 'Artificial Intelligence', 'description' => 'Machine learning, neural networks, and AI applications.'],
            ['id' => 10, 'name' => 'Cloud Computing', 'description' => 'AWS, Azure, Google Cloud, and cloud services.'],
        ];
    

        // Pass data to the welcome view
        return view('welcome', compact('questions', 'categories'));
    }
}
