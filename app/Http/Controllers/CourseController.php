<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Timeslot;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('users')->get();

        return view('dashboards.ldashboard', compact('courses'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();

        return view('courses.create', compact('students'));
    }

    public function store(Request $request)
    {
        $timeslot = Timeslot::create([
            'startday'  => $request->input('startday'),
            'starttime' => $request->input('starttime'),
            'endday'    => $request->input('endday'),
            'endtime'   => $request->input('endtime'),
        ]);
    
        $course = Course::create([
            'name'        => $request->input('name'),
            'type'        => $request->input('type'),
            'trail'       => $request->input('trail'),
            'description' => $request->input('description'),
            'timeslotID'  => $timeslot->id,
        ]);

        return redirect()
        ->route('ldashboard')
        ->with('status', 'Nieuwe les is aangemaakt!');
    
    }

    public function edit(Course $course)
    {
        $students = User::where('role', 'student')->get();

        return view('courses.edit', compact('course', 'students'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'date'        => 'required|date',
            'time'        => 'required',
            'timeslotID' => 'nullable|exists:timeslots,id',
            'type'       => 'nullable|string',
            'userIDs'     => 'nullable|array',
            'userIDs.*'   => 'exists:users,id',
        ]);

        $course->update($data);

        if (isset($data['userIDs'])) {
            $course->users()->sync($data['userIDs']);
        } else {
            $course->users()->detach();
        }

        return redirect()->route('ldashboard')
            ->with('status', 'Course is bijgewerkt!');
    }
}
