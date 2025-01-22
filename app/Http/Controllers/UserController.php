<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function studentenOverzicht()
{
    $studenten = User::where('role', 'student')->get();
    return view('overview.student', compact('studenten'));
}
}
