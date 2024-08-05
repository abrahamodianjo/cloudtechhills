<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function AllClients(){

        $clients = Clients::latest()->get();
        return view('backend.clients.all_clients',compact('clients'));

    } // End Method 

    public function AddClients(){
        return view('backend.clients.add_clients');
    } // End Method 

    public function StoreClients(Request $request){

        $img = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(165,80);

        $img->toPng()->save(base_path('public/upload/clients/'.$name_gen));
        $save_url = 'upload/clients/'.$name_gen;

        Clients::insert([

            'clients_name' => $request->clients_name,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Client Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.clients')->with($notification);

    } // End Method 

    public function EditClients($id){
        $clients = Clients::findOrFail($id);
        return view('backend.clients.edit_clients',compact('clients'));
    }// End Method 

    public function UpdateClients(Request $request){
        $clients_id = $request->id;
        if($request->file('image')){
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->resize(165,80);

        $img->toPng()->save(base_path('public/upload/clients/'.$name_gen));
        $save_url = 'upload/clients/'.$name_gen;

    
        Clients::findOrFail($clients_id)->update([
    
                'clients_name' => $request->clients_name,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'client Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.clients')->with($notification);
        } else {
            Clients::findOrFail($clients_id)->update([
    
                'clients_name' => $request->clients_name,
                'created_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Clients Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.clients')->with($notification);
        } // End Eles 

    }// End Method 

    public function DeleteClients($id){

        $item = Clients::findOrFail($id);
        $img = $item->image;
        unlink($img);

        Clients::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Client Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


     }   // End Method 

}
