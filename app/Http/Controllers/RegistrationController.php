<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'surname'   => 'required',
            'age'       => 'required',
            'role'      => 'required|in:student,leraar,admin',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect('/');
    }
}
