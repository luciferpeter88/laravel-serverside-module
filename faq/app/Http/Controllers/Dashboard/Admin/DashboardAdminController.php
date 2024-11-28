<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allpost()
    {
        return view('dashboard.allpost'); // All post page
    }
    public function addcategory()
    {
        return view('dashboard.addcategory'); // Add category page
    }
    public function allusers()
    {
        return view('dashboard.allusers'); // All users page
    }
}
