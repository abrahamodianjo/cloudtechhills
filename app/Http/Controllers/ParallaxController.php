<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Parallax;

class ParallaxController extends Controller
{
    public function ParallaxSetting(){

        $parallax = Parallax::find(1);
        return view('backend.parallax.parallax_update',compact('parallax'));

    }// End Method Parallaxsetting Controller

    public function ParallaxUpdate(Request $request){
        $parallax_id = $request->id;
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img->resize(1510,430);

            $img->toPng()->save(base_path('public/upload/parallax/'.$name_gen));
            $save_url = 'upload/parallax/'.$name_gen;

            Parallax::findOrFail($parallax_id)->update([

                'caption' => $request->caption,
                'title' => $request->title,
                'image' => $save_url, 
            ]);

            $notification = array(
                'message' => 'Parallax Updated Successfully with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        } else {

            Parallax::findOrFail($parallax_id)->update([

                'caption' => $request->caption,
                'title' => $request->title,
            ]);

            $notification = array(
                'message' => 'Parallax Updated Successfully without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } // End Eles 


    }// End Method 

    
}
