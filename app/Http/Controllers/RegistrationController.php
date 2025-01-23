<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreated;

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

        $user = User::create($data);

        Mail::to($user->email)->send(new AccountCreated($user));

        return redirect('/');
    }
}
