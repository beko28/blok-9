<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeslot;
use App\Models\Course;

class LeraarDashboardController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::with('course')->get();
        $courses = Course::with(['timeslots'])
            ->get();
    
        return view('dashboards.ldashboard', compact('timeslots', 'courses'));
    }
    
}

