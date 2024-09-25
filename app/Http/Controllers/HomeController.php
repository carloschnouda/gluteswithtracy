<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use App\Faq;
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

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required'],
            'message' => ['required', 'string'],
        ]);


        ContactRequest::create($request->all());

        Mail::send('emails.booking-admin-email', compact('request'), function ($message) use ($request) {
            $message->to('carlos.chnouda@gmail.com')->subject('Booking Request');
        });
    }
}
