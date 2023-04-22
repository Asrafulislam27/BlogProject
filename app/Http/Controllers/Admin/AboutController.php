<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        return view('admin.about.index',compact('about'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'about_name' => 'required',
            'about_description' => 'required',

        ]);
        $abouts = About::first();

        $abouts->about_name = $request->about_name;
        $abouts->about_description = $request->about_description;
        $abouts->update();

        $notification = array(
            'message' => 'About Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }
}
