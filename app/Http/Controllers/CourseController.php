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
        $courses = Course::where('user_id', auth()->id())->get();
        return view('dashboards.ldashboard', compact('courses'));
    }

    public function destroy($id)
    {
        try {
            $course = Course::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
    
            $course->delete();
    
            return redirect()->route('ldashboard')->with('success', 'Les succesvol verwijderd.');
        } catch (\Exception $e) {
            return redirect()->route('ldashboard')->with('error', 'Les niet gevonden of je hebt geen rechten.');
        }
    }
    
    public function create()
    {
        $students = User::where('role', 'student')->get();

        return view('courses.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'required|string|in:Piano,Gitaar,Zang,Drums',
            'description' => 'nullable|string',
            'startday'    => 'required|date',
            'starttime'   => 'required|date_format:H:i',
            'endday'      => 'nullable|date',
            'endtime'     => 'nullable|date_format:H:i',
            'duur'        => 'nullable|string',
        ]);
    
        Course::create([
            'name'        => $request->input('name'),
            'type'        => $request->input('type'),
            'description' => $request->input('description'),
            'startday'    => $request->input('startday'),
            'starttime'   => $request->input('starttime'),
            'endday'      => $request->input('endday'),
            'endtime'     => $request->input('endtime'),
            'duur'        => $request->input('duur'),
            'user_id'     => auth()->id(),
        ]);
    
        return redirect()->route('courses.index')->with('success', 'Nieuwe les is aangemaakt!');
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
