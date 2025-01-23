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
        
        return redirect()->route('courses.index');
    }
    
    public function edit(Course $course)
    {
        if ($course->user_id !== auth()->id()) {
            return redirect()->route('ldashboard');
        }
        

        $students = User::where('role', 'student')->get();
        
        return view('courses.edit', compact('course', 'students'));
    }
    
    public function update(Request $request, Course $course)
    {
        
        if ($course->user_id !== auth()->id()) {
            return redirect()->route('ldashboard');
        }
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Piano,Gitaar,Drums,Zang',
            'description' => 'nullable|string',
            'startday' => 'required|date',
            'endday' => 'nullable|date|after_or_equal:startday',
        ]);
        
        $course->update($data);
        
        return redirect()->route('ldashboard');
    }
    
    public function destroy(Course $course)
    {
        if ($course->user_id !== auth()->id()) {
            return redirect()->route('ldashboard');
        }

        
        $course->delete();
        
        return redirect()->route('ldashboard');
    }

    public function enroll($id)
{
    $course = Course::findOrFail($id);

    if (auth()->user()->role !== 'student') {
        return redirect()->route('courses.index')->with('error', 'Alleen studenten kunnen zich inschrijven voor cursussen.');
    }

    if (auth()->user()->courses()->where('course_id', $id)->exists()) {
        return redirect()->route('courses.index')->with('error', 'Je bent al ingeschreven voor deze cursus.');
    }

    auth()->user()->courses()->attach($course);

    return redirect()->route('courses.index')->with('success', 'Je bent succesvol ingeschreven voor de cursus!');
}

public function show(Course $course)
{
    if (auth()->user()->role !== 'admin' && auth()->id() !== $course->user_id && !$course->students->contains(auth()->id())) {
        return redirect()->route('ldashboard')->with('error', 'Je hebt geen toegang tot deze cursus.');
    }

    $students = User::where('role', 'student')->get();

    return view('courses.show', compact('course', 'students'));
}

public function updateStudents(Request $request, Course $course)
{
    if (auth()->id() !== $course->user_id) {
        return redirect()->route('courses.show', $course->id)->with('error', 'Je hebt geen rechten om deze cursus te bewerken.');
    }

    $request->validate([
        'student_ids'   => 'nullable|array',
        'student_ids.*' => 'exists:users,id',
    ]);

    $course->students()->sync($request->input('student_ids', []));

    return redirect()->route('courses.show', $course->id)->with('success', 'Studenten succesvol bijgewerkt!');
}

}

