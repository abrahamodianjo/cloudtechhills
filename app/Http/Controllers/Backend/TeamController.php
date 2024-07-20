<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function AllTeam(){

        $team = Team::latest()->get();
        return view('backend.team.all_team',compact('team'));

    } // End Method 

    public function AddTeam(){
        return view('backend.team.add_team');
    } // End Method 

    public function StoreTeam(Request $request){

        $img = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(270,350);

        $img->toPng()->save(base_path('public/upload/team/'.$name_gen));
        $save_url = 'upload/team/'.$name_gen;

        Team::insert([

            'name' => $request->name,
            'postion' => $request->postion,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Team Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);

    } // End Method 

    public function EditTeam($id){
        $team = Team::findOrFail($id);
        return view('backend.team.edit_team',compact('team'));
    }// End Method 

    public function UpdateTeam(Request $request){
        $team_id = $request->id;
        if($request->file('image')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(270,350);

        $img->toPng()->save(base_path('public/upload/team/'.$name_gen));
        $save_url = 'upload/team/'.$name_gen;

    
            Team::findOrFail($team_id)->update([
    
                'name' => $request->name,
                'postion' => $request->postion,
                'facebook' => $request->facebook,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Team Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.team')->with($notification);
        } else {
            Team::findOrFail($team_id)->update([
    
                'name' => $request->name,
                'postion' => $request->postion,
                'facebook' => $request->facebook, 
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Team Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.team')->with($notification);
        } // End Eles 

    }// End Method 

    public function DeleteTeam($id){

        $item = Team::findOrFail($id);
        $img = $item->image;
        unlink($img);

        Team::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


     }   // End Method 


}


