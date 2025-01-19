<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'timeslotID',
        'usersID',
        'feedback',
        'type',
        'trail',
        'description',
        'name',
        'date',
        'time'
    ];

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
