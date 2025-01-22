<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrialLesson;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = 0;

        if (auth()->check()) {
            if (auth()->user()->role === 'leraar') {
                $notifications = TrialLesson::where('teacher_id', auth()->id())->where('status', 'pending')->count();
            } elseif (auth()->user()->role === 'admin') {
                $notifications = TrialLesson::where('status', 'pending')->count();
            }
        }

        return response()->json(['count' => $notifications]);
    }
}
