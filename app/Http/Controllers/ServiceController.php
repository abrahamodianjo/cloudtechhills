<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function AllServices()

    {
        $services = Service::latest()->get();
        return view('backend.services.view_services', compact('services'));
    } //End of Add service Backend method


    public function AddServices()
    {
        return view('backend.services.add_services');
    } //End of Add service Backend method

    public function StoreServices(Request $request)
    {
        $img = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(670, 440);

        $img->toPng()->save(base_path('public/upload/services/' . $name_gen));
        $save_url = 'upload/services/' . $name_gen;

        Service::insert([

            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Service Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);
    } //end of store service backend method

    public function EditServices($id)
    {
        $services = Service::findOrFail($id);
        return view('backend.services.edit_services', compact('services'));
    } // End of edit service backend method

    public function UpdateServices(Request $request)
    {
        $services_id = $request->id;
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img->resize(670, 440);

            $img->toPng()->save(base_path('public/upload/services/' . $name_gen));
            $save_url = 'upload/services/' . $name_gen;


            Service::findOrFail($services_id)->update([

                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Services Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        } else {
            Service::findOrFail($services_id)->update([

                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Services Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        } // End Eles 

    } // End of update service backend method

    public function DeleteServices($id)
    {
        $services = Service::findOrFail($id);
        $img = $services->image;
        unlink($img);

        Service::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Services Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
