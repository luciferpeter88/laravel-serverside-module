<?php

namespace App\Http\Controllers\Dashboard\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
