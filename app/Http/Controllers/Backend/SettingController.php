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
    public function SiteSetting()
    {
        
        $site = SiteSetting::find(1);
        return view('backend.site.site_update', compact('site'));
    } // End Method sitesetting Controller

    public function SiteUpdate(Request $request)
    {
        $site_id = $request->id;
        $siteSetting = SiteSetting::findOrFail($site_id);
        if ($request->file('logo') || $request->file('additional_image')) {
            $manager = new ImageManager(new Driver());
            // $name_gen = hexdec(uniqid()) . '.' . $request->file('logo')->getClientOriginalExtension();
            // $name_gen_2 = hexdec(uniqid()) . '.' . $request->file('additional_image')->getClientOriginalExtension();
            // $img = $manager->read($request->file('logo'));
            // $img_2 = $manager->read($request->file('additional_image'));
            // $img->resize(270, 140);
            // $img_2->resize(1510, 750);
            // $img->toPng()->save(base_path('public/upload/site/' . $name_gen));
            // $img_2->toPng()->save(base_path('public/upload/site/' . $name_gen_2));
            // $save_url = 'upload/site/' . $name_gen;
            

            // Process logo
        if ($request->file('logo')) {
            $name_gen = hexdec(uniqid()).'.'.$request->file('logo')->getClientOriginalExtension();
            $img = $manager->read($request->file('logo'));
            $img->resize(270, 140);
            $img->toPng()->save(base_path('public/upload/site/' . $name_gen));
            $save_url = 'upload/site/' . $name_gen;
            $siteSetting->logo = $save_url;
        }

        // Process additional image
        if ($request->file('additional_image')) {
            $name_gen_2 = hexdec(uniqid()).'.'.$request->file('additional_image')->getClientOriginalExtension();
            $img_2 = $manager->read($request->file('additional_image'));
            $img_2->resize(1510, 750);;
            $img_2->toPng()->save(base_path('public/upload/site/' . $name_gen_2));
            $save_url_2 = 'upload/site/' . $name_gen_2;
            $siteSetting->additional_image = $save_url_2;
            
        }


        $siteSetting->phone = $request->phone;
        $siteSetting->address = $request->address;
        $siteSetting->email = $request->email;
        $siteSetting->twitter = $request->twitter;
        $siteSetting->copyright = $request->copyright;

        $siteSetting->save();

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


    } // End Method 

    public function AdminContactMessage()
    {

        $contact = Contact::latest()->get();
        return view('backend.contact.contact_message', compact('contact'));
    } // End Method


}
