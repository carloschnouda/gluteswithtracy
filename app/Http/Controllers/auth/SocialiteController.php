<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        $user = Socialite::driver('google')->user();

        $existing_user = User::where('google_id', $user->id)->first();

        $old_user = User::where('email', $user->email)->first();

        if ($existing_user) {
            Auth::login($existing_user);
            return redirect('/');
        } else if ($old_user) {

            $old_user->google_id = $user->id;
            $old_user->email_verified = 1;
            $old_user->avatar = $user->avatar_original;
            $old_user->update();

            Auth::login($old_user);
            return redirect('/');
        } else {
            $newUser = User::create([
                'first_name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('123456dummy'),
                'email_verified' => 1,
                'avatar' => $user->avatar_original
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }

    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {

        $user = Socialite::driver('facebook')->user();

        $existing_user = User::where('facebook_id', $user->id)->first();

        $old_user = User::where('email', $user->email)->first();

        if ($existing_user) {
            Auth::login($existing_user);
            return redirect('/');
        } else if ($old_user) {

            $old_user->facebook_id = $user->id;
            $old_user->email_verified = 1;
            $old_user->update();

            Auth::login($old_user);
            return redirect('/');
        } else {
            $saveUser = User::create([
                'facebook_id' => $user->id,
                'first_name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->name . '@' . $user->id),
                'email_verified' => 1,
                'avatar' => $user->avatar
            ]);

            Auth::login($saveUser);

            return redirect('/');
        }
    }

    public function deletionFromFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
}
