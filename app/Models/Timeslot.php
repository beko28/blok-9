<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $table = 'timeslots';

    protected $fillable = [
        'startday',
        'starttime',
        'endday',
        'endtime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
    
}
