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

        // Regenerate the session to prevent fixation attacks
        request()->session()->regenerate();

        // Step 1: Retrieve current plans
        $currentPlans = Auth::user()->user_plans->pluck('id')->toArray();

        // Step 2: Retrieve the previous plans from session (if any)
        $storedPlans = session('user_plans', []);

        // Step 3: Compare plans and check if there are new plans added
        $newPlans = array_diff($currentPlans, $storedPlans);

        if (!empty($newPlans)) {
            // Step 4: If there are new plans, flash a message and update session
            session(['user_plans' => $currentPlans]);
            session()->flash('success', 'New workout plan has been added to your dashboard.');
        }

        //redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
