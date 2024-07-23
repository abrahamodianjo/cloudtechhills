<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\AboutUs;
use App\Models\PieChart;
use App\Models\PieChartApproach;
use Carbon\Carbon;

class AboutUsController extends Controller
{
    public function AboutUs()
    {

        return view('frontend.about_us.about_us');
    }


    ///////////////// BACKEND CONTROLLER METHODS //////////////////

    public function EditAboutUsBanner()
    {
        $Aboutusbanner = AboutUs::find(1);
        return view('backend.about_us.banner.edit_banner', compact('Aboutusbanner'));
    } //End Method

    public function UpdateAboutUsBanner(Request $request)
    {

        $Aboutusbanner_id = $request->id;
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img->resize(1500, 630);

            $img->toPng()->save(base_path('public/upload/about_us/' . $name_gen));
            $save_url = 'upload/about_us/' . $name_gen;

            AboutUs::findOrFail($Aboutusbanner_id)->update([
                'title' => $request->title,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'About Us Banner Updated Successfully with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            AboutUs::findOrFail($Aboutusbanner_id)->update([

                'title' => $request->title,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'About us title Updated Successfully without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } // End Else statment 


    } // End Method 

    public function EditPieChart()
    {
        $piechart = PieChart::find(1);
        return view('backend.about_us.pie_chart.edit_pie_chart', compact('piechart'));
    } //End Method

    public function UpdatePieChart(Request $request)
    {

        $piechart_id = $request->id;
        PieChart::findOrFail($piechart_id)->update([

            'caption' => $request->caption,
            'title' => $request->title,
            'Updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Notes Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 


    public function AllPieCharts()
    {

        $piechartapproach = PieChartApproach::latest()->get();
        return view('backend.about_us.pie_chart.all_pie_chart', compact('piechartapproach'));
    } //End Method

    public function AddPieChart()
    {
        return view('backend.about_us.pie_chart.add_pie_chart');
    } //End Method

    public function StorePieChart(Request $request)
    {

        PieChartApproach::insert([

            'percentage' => $request->percentage,
            'service' => $request->service,
            'approach' => $request->approach,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'service approach Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.pie.chart')->with($notification);
    } // End Method 

    public function EditPieChartApproach($id)
    {

        $piechartapproach = PieChartApproach::findOrFail($id);
        return view('backend.about_us.pie_chart.edit_pie_chart_approach', compact('piechartapproach'));
    } //End Method

    public function UpdatePieChartApproach(Request $request){

        $piechart_id = $request->id;
        PieChartApproach::findOrFail($piechart_id)->update([

            'percentage' => $request->percentage,
            'service' => $request->service,
            'approach' => $request->approach,
            'Updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Pie Chart Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    public function DeletePieChart($id){

        $item = PieChartApproach::findOrFail($id);

        PieChartApproach::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Pie Chart Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }   // End Method 



}
