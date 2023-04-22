<?php

namespace App\Http\Controllers\Admin;

use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function index(){
        $privacys = Privacy::first();
        return view('admin.privacy.index',compact('privacys'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'privacy_name' => 'required',
            'privacy_description' => 'required',

        ]);
        $privacys = Privacy::first();

        $privacys->privacy_name = $request->privacy_name;
        $privacys->privacy_description = $request->privacy_description;
        $privacys->update();

        $notification = array(
            'message' => 'Privacy Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }
}
