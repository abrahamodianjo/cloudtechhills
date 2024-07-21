<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function AllBanner(){

        $banner = Banner::latest()->get();
        return view('backend.banner.all_banner',compact('banner'));

    } // End Method 

    public function AddBanner(){
        return view('backend.banner.add_banner');
    } // End Method 

    public function StoreBanner(Request $request){

        $img = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(1500,630);

        $img->toPng()->save(base_path('public/upload/banner/'.$name_gen));
        $save_url = 'upload/banner/'.$name_gen;

        Banner::insert([

            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Banner Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.banner')->with($notification);

    } // End Method 

    public function EditBanner($id){
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit_banner',compact('banner'));
    }// End Method 

    public function UpdateBanner(Request $request){
        $banner_id = $request->id;
        if($request->file('image')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(1500,630);

        $img->toPng()->save(base_path('public/upload/banner/'.$name_gen));
        $save_url = 'upload/banner/'.$name_gen;

    
            Banner::findOrFail($banner_id)->update([
    
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Banner Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.banner')->with($notification);
        } else {
            Banner::findOrFail($banner_id)->update([
    
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Banner Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.banner')->with($notification);
        } // End Eles 

    }// End Method 

    public function DeleteBanner($id){

        $item = Banner::findOrFail($id);
        $img = $item->image;
        unlink($img);

        Banner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Banner Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


     }   // End Method 


}


