<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::first();
        return view('admin.setting.index',compact('settings'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'site_name' => 'required',
            'copyright_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'logo' => 'mimes:jpeg,jpg,png',
            'favicon' => 'mimes:jpeg,jpg,png',
            'footer_description' => 'required',

        ]);

        $settings = Setting::first();
    
        $settings->site_name = $request->site_name;
        $settings->copyright_name = $request->copyright_name;


        if($request->hasfile('logo')){

            $destination = 'Upload/Logo/'.$settings->logo;

                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //$file->move('Upload/Post/',$filename);
            $new_img = Image::make($file->getRealPath())->resize(148, 62);

            $new_img->save('Upload/Logo/'. $filename, 80);

            $settings->logo = $filename;
        }

        if($request->hasfile('favicon')){

            $destination = 'Upload/Favicon/'.$settings->favicon;

                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file = $request->file('favicon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //$file->move('Upload/Post/',$filename);
            $new_img = Image::make($file->getRealPath())->resize(32, 32);

            $new_img->save('Upload/Logo/'. $filename, 80);

            $settings->Favicon = $filename;
        }

        $settings->footer_description = $request->footer_description;
        $settings->address = $request->address;
        $settings->phone_number = $request->phone_number;
        $settings->email = $request->email;

        $settings->save();

        $notification = array(
            'message' => 'Setting Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
