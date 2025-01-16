<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $lessons = Course::where('userID', auth()->id())->with('timeslot')->get();
        return view('student.dashboard', compact('Course'));
    }
}
