<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $gegevens = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($gegevens, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/'); 
        }

        throw ValidationException::withMessages([
            'email' => __('Deze gegevens komen niet overeen met onze records.'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Je bent succesvol uitgelogd.');
    }
}
