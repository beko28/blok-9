<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'feedback_id',
        'type',
        'duur',
        'description',
        'name',
        'startday',
        'starttime',
        'endday',
        'endtime',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
