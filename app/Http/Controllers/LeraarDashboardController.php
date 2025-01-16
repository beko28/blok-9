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
        $course = Course::with(['student', 'timeslot'])->get();
        return view('dashboards.ldashboard', compact('timeslots', 'course'));
    }
}

