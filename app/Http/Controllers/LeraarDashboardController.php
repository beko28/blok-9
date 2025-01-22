<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class LeraarDashboardController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->get();
    
        return view('dashboards.ldashboard', compact('courses'));
    }
}
