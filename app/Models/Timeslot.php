<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}