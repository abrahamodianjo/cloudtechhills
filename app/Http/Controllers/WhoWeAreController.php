<?php

namespace App\Http\Controllers;
use App\Models\WhoWeAre;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    public function WhoWeAreSetting()
    {
        $whoweare = WhoWeAre::find(1);
        return view('backend.about_us.whoweare.who_we_are_update', compact('whoweare'));
    } // End Method sitesetting Controller

    public function WhoWeAreUpdate(Request $request)
    {
        $whoweare_id = $request->id;
        if($request->file('image')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(570,490);

        $img->toPng()->save(base_path('public/upload/whoweare/'.$name_gen));
        $save_url = 'upload/whoweare/'.$name_gen;

    
        WhoWeAre::findOrFail($whoweare_id)->update([
    
                'caption' => $request->caption,
                'title' => $request->title,
                'description' => $request->description,
                'icon_1' => $request->icon_1,
                'icon_1_title' => $request->icon_1_title,
                'icon_1_description' => $request->icon_1_description,
                'icon_2' => $request->icon_2,
                'icon_2_title' => $request->icon_2_title,
                'icon_2_description' => $request->icon_2_description,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Who we are section Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.who.we.are')->with($notification);
        } else {
            WhoWeAre::findOrFail($whoweare_id)->update([
    
                'caption' => $request->caption,
                'title' => $request->title,
                'description' => $request->description,
                'icon_1' => $request->icon_1,
                'icon_1_title' => $request->icon_1_title,
                'icon_1_description' => $request->icon_1_description,
                'icon_2' => $request->icon_2,
                'icon_2_title' => $request->icon_2_title,
                'icon_2_description' => $request->icon_2_description,
                'updated_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Who we are section Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.who.we.are')->with($notification);
        } // End Eles 

    } // End Method 
}
