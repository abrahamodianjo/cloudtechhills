<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\sitesetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use App\Models\Contact;

class SettingController extends Controller
{
    public function SiteSetting(){

        $site = SiteSetting::find(1);
        return view('backend.site.site_update',compact('site'));

    }// End Method sitesetting Controller

    public function SiteUpdate(Request $request){
        $site_id = $request->id;
        if($request->file('logo')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('logo')->getClientOriginalExtension();
            $img = $manager->read($request->file('logo'));
            $img->resize(270,140);

            $img->toPng()->save(base_path('public/upload/site/'.$name_gen));
            $save_url = 'upload/site/'.$name_gen;

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url, 
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        } else {

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
               
                'twitter' => $request->twitter,
                'copyright' => $request->copyright, 
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } // End Eles 


    }// End Method 

    public function AdminContactMessage(){

        $contact = Contact::latest()->get();
        return view('backend.contact.contact_message',compact('contact'));

     }// End Method


}
