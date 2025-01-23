<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Course;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all();
        return view('feedback.index', compact('feedback'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create([
            'course_id' => $course->id,
            'student_id' => $request->student_id,
            'teacher_id' => auth()->id(),
            'feedback' => $request->feedback,
            'rating' => $request->rating,
        ]);

        return redirect()->route('courses.show', $course->id)->with('success', 'Feedback succesvol ingediend!');
    }
}