<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class LeraarDashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();
    
        return view('dashboards.ldashboard', compact('courses'));
    }
}
