<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // Send an email
        Mail::raw('A new user has subscribed with the email: ' . $email, function ($message) use ($email) {
            $message->to('subcribers@cloudtechhills.com')  // Replace with your email address
                    ->subject('New Subscription');
        });

        return response()->json(['message' => 'Subscription successful!']);
    }
}
