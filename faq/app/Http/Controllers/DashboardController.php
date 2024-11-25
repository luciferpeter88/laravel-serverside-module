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
        return view('dashboard'); // Optional: Main dashboard page
    }

    public function profile()
    {
        return view('dashboard.profile'); // Profile page
    }

    public function posts()
    {
        return view('dashboard.posts'); // Posts page
    }

    public function settings()
    {
        return view('dashboard.settings'); // Settings page
    }
}
