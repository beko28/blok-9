<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'student_id',
        'teacher_id',
        'feedback',
        'rating',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}