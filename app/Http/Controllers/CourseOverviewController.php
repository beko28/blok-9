<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseOverviewController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('overview.course', compact('courses'));
    }
}
