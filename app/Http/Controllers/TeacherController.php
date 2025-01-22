<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TrialLesson;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'leraar')->get();

        return view('teachers.index', compact('teachers'));
    }

    public function requestTrial($teacherId)
    {
        if (auth()->user()->role !== 'student') {
            return redirect()->route('teachers.index')->with('error', 'Alleen studenten kunnen een proefles aanvragen.');
        }

        if (TrialLesson::where('student_id', auth()->id())->where('teacher_id', $teacherId)->exists()) {
            return redirect()->route('teachers.index')->with('error', 'Je hebt al een proefles aangevraagd bij deze leraar.');
        }

        TrialLesson::create([
            'student_id' => auth()->id(),
            'teacher_id' => $teacherId,
            'status' => 'pending',
        ]);

        return redirect()->route('teachers.index')->with('success', 'Proefles succesvol aangevraagd!');
    }
}
