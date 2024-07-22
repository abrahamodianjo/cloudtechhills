<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function AboutUs(){

        return view('frontend.about_us.about_us');
    }
}
