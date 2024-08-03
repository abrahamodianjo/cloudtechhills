<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceBanner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ServiceBannerController extends Controller
{
    public function ServicesBannerSetting()
    {
        $servicesbanner = ServiceBanner::find(1);
       
        return view('backend.servicesbanner.edit_banner_services', compact('servicesbanner'));
    } // End Method sitesetting Controller

    
    public function ServicesBannerUpdate(Request $request)
    {
        $servicesbanner_id = $request->id;
        $servicesbanner = ServiceBanner::findOrFail($servicesbanner_id);
        if ($request->file('first_image') || $request->file('second_image')) {
            $manager = new ImageManager(new Driver());

            if ($request->file('first_image')) {
                $name_gen = hexdec(uniqid()) . '.' . $request->file('first_image')->getClientOriginalExtension();
                $img = $manager->read($request->file('first_image'));
                $img->resize(270, 140);
                $img->toPng()->save(base_path('public/upload/services_banner/' . $name_gen));
                $save_url = 'upload/services_banner/' . $name_gen;
                $servicesbanner->first_image = $save_url;
            }

            // Process additional image
            if ($request->file('second_image')) {
                $name_gen_2 = hexdec(uniqid()) . '.' . $request->file('second_image')->getClientOriginalExtension();
                $img_2 = $manager->read($request->file('second_image'));
                $img_2->resize(1510, 750);;
                $img_2->toPng()->save(base_path('public/upload/services_banner/' . $name_gen_2));
                $save_url_2 = 'upload/services_banner/' . $name_gen_2;
                $servicesbanner->first_image = $save_url_2;
            }

            $servicesbanner->caption = $request->caption;
            $servicesbanner->decription = $request->description;

            $servicesbanner->save();

            $notification = array(
                'message' => 'services banner Updated Successfully with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            ServiceBanner::findOrFail($servicesbanner_id)->update([

                'caption' => $request->caption,
                'description' => $request->description,
                
            ]);

            $notification = array(
                'message' => 'Services Banner Updated Successfully without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // End Eles 


    } // End Method 

}

