<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testmonials;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestmonialsController extends Controller
{
    public function AllTestmonials()
    {

        $testmonials = Testmonials::latest()->get();
        return view('backend.testmonials.all_testmonials', compact('testmonials'));
    } // End Method 

    public function AddTestmonials()
    {
        return view('backend.testmonials.add_testmonials');
    } // End Method 

    public function StoreTestmonials(Request $request)
    {
        $img = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(80,80);

        $img->toPng()->save(base_path('public/upload/testmonials/'.$name_gen));
        $save_url = 'upload/testmonials/'.$name_gen;

        Testmonials::insert([

            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Testimonials Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testmonials')->with($notification);
    } // End Method 

    public function EditTestmonials($id)
    {
        $testmonials = Testmonials::findOrFail($id);
        return view('backend.testmonials.edit_testmonials', compact('testmonials'));
    } // End Method 

    public function UpdateTestmonials(Request $request)
    {
        $testmonials_id = $request->id;
        if($request->file('image')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(80,80);

        $img->toPng()->save(base_path('public/upload/testmonials/'.$name_gen));
        $save_url = 'upload/testmonials/'.$name_gen;

    
        Testmonials::findOrFail($testmonials_id)->update([
    
            'name' => $request->name,
            'postion' => $request->postion,
            'description' => $request->description,
            'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Testmonial Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.testmonials')->with($notification);
        } else {
            Testmonials::findOrFail($testmonials_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
               
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Testmonials Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.testmonials')->with($notification);
        } // End Eles 

    } // End Method 

    public function DeleteTestmonials($id)
    {

        Testmonials::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testmonial Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }   // End Method 
}
