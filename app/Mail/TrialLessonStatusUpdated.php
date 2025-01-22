<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\TrialLesson;

class TrialLessonStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $trialLesson;

    public function __construct(TrialLesson $trialLesson)
    {
        $this->trialLesson = $trialLesson;
    }

    public function build()
    {
        return $this->subject('Update over je proefles')
                    ->view('emails.trial-lesson-status');
    }
}
