<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactUs()
    {

        return view('frontend.contact.contact_us');
    }

    public function StoreContactUs(Request $request)
    {

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Message Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

 


}
