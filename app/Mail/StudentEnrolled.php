<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;
use App\Models\User;

class StudentEnrolled extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $student;

    public function __construct(Course $course, User $student)
    {
        $this->course = $course;
        $this->student = $student;
    }

    public function build()
    {
        return $this->subject('🎵 Je bent ingeschreven voor een cursus!')
                    ->view('emails.student-enrolled');
    }
}
