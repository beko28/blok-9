<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrialLesson;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrialLessonRequested;
use App\Mail\TrialLessonStatusUpdated;

class TrialLessonController extends Controller
{
    public function index()
    {
        $trialLessons = auth()->user()->trialLessonsAsStudent()->with('teacher')->get();
        return view('trial-lessons.index', compact('trialLessons'));
    }

    public function teacherIndex()
    {
        $trialLessons = auth()->user()->trialLessonsAsTeacher()->with('student')->get();
        return view('trial-lessons.teacher-index', compact('trialLessons'));
    }

    public function approve(TrialLesson $trialLesson)
    {
        if (auth()->id() !== $trialLesson->teacher_id) {
            return redirect()->route('teacher.trial-lessons')->with('error', 'Je hebt geen rechten om deze aanvraag te beheren.');
        }

        $trialLesson->update(['status' => 'approved']);

        Mail::to($trialLesson->student->email)->send(new TrialLessonStatusUpdated($trialLesson));

        return redirect()->route('teacher.trial-lessons')->with('success', 'Proefles goedgekeurd!');
    }

    public function reject(TrialLesson $trialLesson)
    {
        if (auth()->id() !== $trialLesson->teacher_id) {
            return redirect()->route('teacher.trial-lessons')->with('error', 'Je hebt geen rechten om deze aanvraag te beheren.');
        }

        $trialLesson->update(['status' => 'rejected']);

        Mail::to($trialLesson->student->email)->send(new TrialLessonStatusUpdated($trialLesson));

        return redirect()->route('teacher.trial-lessons')->with('success', 'Proefles geweigerd.');
    }
}
