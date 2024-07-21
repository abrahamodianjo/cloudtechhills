<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function AllFeatures()
    {

        $features = Features::latest()->get();
        return view('backend.features.all_features', compact('features'));
    } // End Method 

    public function AddFeatures()
    {
        return view('backend.features.add_features');
    } // End Method 

    public function StoreFeatures(Request $request)
    {


        Features::insert([

            'icon' => $request->icon,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Features Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    } // End Method 

    public function EditFeatures($id)
    {
        $features = Features::findOrFail($id);
        return view('backend.features.edit_features', compact('features'));
    } // End Method 

    public function UpdateFeatures(Request $request)
    {
        $features_id = $request->id;


        Features::findOrFail($features_id)->update([

            'icon' => $request->icon,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Features Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    } // End Method 

    public function DeleteFeatures($id)
    {

        Features::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Features Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }   // End Method 
}
