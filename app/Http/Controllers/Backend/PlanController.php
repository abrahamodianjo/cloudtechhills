<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\plan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function AllPlan()
    {

        $plan = plan::latest()->get();
        return view('backend.plan.all_plan', compact('plan'));
    } // End Method 

    public function AddPlan()
    {
        return view('backend.plan.add_plan');
    } // End Method 

    public function StorePlan(Request $request)
    {


        plan::insert([

            'name' => $request->name,
            'amount' => $request->amount,
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'title_3' => $request->title_3,
            'title_4' => $request->title_4,
            'title_5' => $request->title_5,
            'title_6' => $request->title_6,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Plan Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.plan')->with($notification);
    } // End Method 

    public function EditPlan($id)
    {
        $plan = plan::findOrFail($id);
        return view('backend.plan.edit_plan', compact('plan'));
    } // End Method 

    public function UpdatePlan(Request $request)
    {
        $plan_id = $request->id;


        plan::findOrFail($plan_id)->update([

            'name' => $request->name,
            'amount' => $request->amount,
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'title_3' => $request->title_3,
            'title_4' => $request->title_4,
            'title_5' => $request->title_5,
            'title_6' => $request->title_6,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Plan Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.plan')->with($notification);
    } // End Method 

    public function DeletePlan($id)
    {

        plan::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }   // End Method 
}
