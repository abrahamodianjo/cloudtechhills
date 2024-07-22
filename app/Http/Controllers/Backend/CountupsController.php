<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Countups;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountupsController extends Controller
{
  

    public function EditCountups()
    {
        $countups = Countups::find(1);
        return view('backend.countups.edit_countups', compact('countups'));
    } // End Method 

    public function UpdateCountups(Request $request)
    {
        $countups_id = $request->id;
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img->resize(755, 530);

            $img->toPng()->save(base_path('public/upload/countups/' . $name_gen));
            $save_url = 'upload/countups/' . $name_gen;


            Countups::findOrFail($countups_id)->update([

                'caption' => $request->caption,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'team_members' => $request->team_members,
                'team_members_note' => $request->team_members_note,
                'happy_clients' => $request->happy_clients,
                'happy_clients_note' => $request->happy_clients_note,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Count ups Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.countups')->with($notification);
        } else {
            Countups::findOrFail($countups_id)->update([

                
                'caption' => $request->caption,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'team_members' => $request->team_members,
                'team_members_note' => $request->team_members_note,
                'happy_clients' => $request->happy_clients,
                'happy_clients_note' => $request->happy_clients_note,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Count ups Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.countups')->with($notification);
        } // End Eles 

    } // End Method 


}
