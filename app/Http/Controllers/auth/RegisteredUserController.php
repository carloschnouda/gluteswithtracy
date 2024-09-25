<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //create email confirmation token
        $email_confirmation_token = bin2hex(random_bytes(16));

        //validate
        $attributes = request()->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        //create user
        $user = User::create($attributes);
        $user->verification_token = $email_confirmation_token;
        $user->save();
        //verify Email
        $confirm_email_url = env('APP_URL') . '/email-verification/' . request()->email . '/' . $email_confirmation_token;
        try {

            Mail::send('emails.verify-email', compact('confirm_email_url', 'attributes'), function ($message) use ($attributes) {
                $message->to($attributes['email'])->subject('Email Confirmation');
            });
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong. Please try again.');
            return redirect('/register');
        }

        //redirect to dashboard
        return redirect('/login')->with('success', 'We have sent you an email. Please check your email to verify your account.');
    }

    public function verifyEmail($email, $token)
    {
        $user = User::where('email', $email)->first();
        if ($user && ($user->verification_token == $token)) {
            $user->update([
                'email_verified' => 1,
                'verification_token' => null
            ]);
            Auth::login($user);
            Session::flash('success', 'Email verified successfully. Welcome ' . $user->first_name . ' ' . $user->last_name . '!');
            return redirect('/');
        }
        Session::flash('error', 'Email verification failed. Please try again.');
        return redirect('/login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordSendEmail()
    {

        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255']
        ]);
        $user = User::where('email', $attributes['email'])->first();
        if ($user) {
            $password_reset_token = bin2hex(random_bytes(16));
            $user->password_reset_token = $password_reset_token;
            $user->save();
            $reset_password_url = env('APP_URL') . '/reset-password/' . $attributes['email'] . '/' . $password_reset_token;
            try {
                Mail::send('emails.forgot-password', compact('reset_password_url', 'attributes'), function ($message) use ($attributes) {
                    $message->to($attributes['email'])->subject('Reset Password');
                });
            } catch (\Exception $e) {
                Session::flash('error', 'Something went wrong. Please try again.');
                return redirect('/forgot-password');
            }
            Session::flash('success', 'We have sent you an email. Please check your email to reset your password.');
        } else {
            throw ValidationException::withMessages([
                'email' => 'This Email is not registered.'
            ]);
        }
        return redirect('/login');
    }

    public function resetPassword($email, $token)
    {
        $user = User::where('email', $email)->first();
        if ($user && ($user->password_reset_token == $token)) {
            return view('auth.reset-password', compact('email', 'token'));
        }
        Session::flash('error', 'Password reset failed. Please try again.');
        return redirect('/login');
    }

    public function resetPasswordSendEmail()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(6)]
        ]);
        $user = User::where('email', $attributes['email'])->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($attributes['password']),
                'password_reset_token' => null
            ]);
            Auth::login($user);
            Session::flash('success', 'Password reset successfully. Welcome ' . $user->first_name . ' ' . $user->last_name . '!');
            return redirect('/');
        }
        Session::flash('error', 'Password reset failed. Please try again.');
        return redirect('/login');
    }
}
