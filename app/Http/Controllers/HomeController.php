<?php

namespace App\Http\Controllers;

use App\AbsWorkout;
use App\ContactRequest;
use App\Faq;
use App\GeneralSetting;
use App\Models\User;
use App\OurService;
use App\SeoPage;
use App\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    /**
     * Display the resource.
     */
    public function show()
    {
        $services = OurService::orderBy('ht_pos')->get();
        $faqs = Faq::orderBy('ht_pos')->get();

        return view('home', compact('services', 'faqs'));
    }

    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->with('user_plans.categories.workouts')->first();
        $abs_workout = AbsWorkout::orderBy('ht_pos')->get();
        return view('dashboard', compact('abs_workout', 'user'));
    }

    function submitContactForm(Request $request)
    {

        $admin_email = GeneralSetting::first()->admin_email;

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
            'message' => ['required', 'string'],
        ]);


        ContactRequest::create($request->all());

        Mail::send('emails.booking-admin-email', compact('request'), function ($message) use ($admin_email) {
            $message->to($admin_email)->subject('Booking Request');
        });
    }


    public function submitProgressForm(Request $request)
    {
        $admin_email = GeneralSetting::first()->admin_email;

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'current_weight' => ['required', 'numeric'],
            'front_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'back_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'side_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        // Store the uploaded images
        $frontImage = $request->file('front_image')->store('images', 'public');
        $backImage = $request->file('back_image')->store('images', 'public');
        $sideImage = $request->file('side_image')->store('images', 'public');

        // update user details
        $user = User::where('email', $request->email)->first();
        $user->update($request->except('front_image', 'back_image', 'side_image'));
        $user->front_image = $frontImage;
        $user->back_image = $backImage;
        $user->side_image = $sideImage;
        $user->save();

        // Send email or save details in the database
        Mail::send('emails.progress-mail', compact('request'), function ($message) use ($request, $frontImage, $backImage, $sideImage, $admin_email) {
            $message->to($admin_email)
                ->subject('Progress Submission')
                ->attach(storage_path('app/public/' . $frontImage))
                ->attach(storage_path('app/public/' . $backImage))
                ->attach(storage_path('app/public/' . $sideImage));
        });
    }
}
