<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //attempt
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'Your Email or Password is incorrect.'
            ]);
        }

        //Check if email verified
        if (! Auth::user()->email_verified) {
            throw ValidationException::withMessages([
                'password' => 'Please verify your email.'
            ]);
        }
        //regenrate session
        request()->session()->regenerate();

        //redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
