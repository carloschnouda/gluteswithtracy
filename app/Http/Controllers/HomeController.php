<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use App\Faq;
use App\GeneralSetting;
use App\OurService;
use Illuminate\Http\Request;
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


    function submitContactForm(Request $request)
    {

        $admin_email = GeneralSetting::first()->admin_email;

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required'],
            'message' => ['required', 'string'],
        ]);


        ContactRequest::create($request->all());

        Mail::send('emails.booking-admin-email', compact('request'), function ($message) use ($admin_email) {
            $message->to($admin_email)->subject('Booking Request');
        });
    }
}
