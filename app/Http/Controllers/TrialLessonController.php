<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrialLesson;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrialLessonRequested;
use App\Mail\TrialLessonStatusUpdated;

class TrialLessonController extends Controller
{
    // Overzicht voor studenten
    public function index()
    {
        $trialLessons = auth()->user()->trialLessonsAsStudent()->with('teacher')->get();
        return view('trial-lessons.index', compact('trialLessons'));
    }

    // Overzicht voor leraren
    public function teacherIndex()
    {
        $trialLessons = auth()->user()->trialLessonsAsTeacher()->with('student')->get();
        return view('trial-lessons.teacher-index', compact('trialLessons'));
    }

    // Proefles goedkeuren
    public function approve(TrialLesson $trialLesson)
    {
        if (auth()->id() !== $trialLesson->teacher_id) {
            return redirect()->route('teacher.trial-lessons')->with('error', 'Je hebt geen rechten om deze aanvraag te beheren.');
        }

        $trialLesson->update(['status' => 'approved']);

        // Notificatie sturen naar de student
        Mail::to($trialLesson->student->email)->send(new TrialLessonStatusUpdated($trialLesson));

        return redirect()->route('teacher.trial-lessons')->with('success', 'Proefles goedgekeurd!');
    }

    // Proefles weigeren
    public function reject(TrialLesson $trialLesson)
    {
        if (auth()->id() !== $trialLesson->teacher_id) {
            return redirect()->route('teacher.trial-lessons')->with('error', 'Je hebt geen rechten om deze aanvraag te beheren.');
        }

        $trialLesson->update(['status' => 'rejected']);

        // Notificatie sturen naar de student
        Mail::to($trialLesson->student->email)->send(new TrialLessonStatusUpdated($trialLesson));

        return redirect()->route('teacher.trial-lessons')->with('success', 'Proefles geweigerd.');
    }
}
