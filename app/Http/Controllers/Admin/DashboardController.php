<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::count();
        $posts = Post::count();
        $tags = Tag::count();
        $users = User::where('role_as','0')->count();
        $admins = User::where('role_as','1')->count();
        return view('admin.dashboard',compact('categories','posts','tags','users','admins'));
    }

    public function profile(){
        $id = Auth::user()->id;

        $profile = User::find($id);

        return view('admin.profile.index',compact('profile'));
    }

    public function edit(){
        $id = Auth::user()->id;

        $editprofile = User::find($id);

        return view('admin.profile.edit',compact('editprofile'));

    }

    public function storeProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->description = $request->description;

        if($request->hasfile('Profile_image')){

            $destination = 'Upload/Profile/'.$data->Profile_image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file = $request->file('Profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $new_img = Image::make($file->getRealPath())->resize(40, 40);

            $new_img->save('Upload/Profile/'. $filename, 80);

            $data->Profile_image = $filename;
        }
        $data->save();

        return redirect('admin/profile');

    }


    public function changepassword(){

        return view('admin.passwordchange.index');
    }
    public function updatepassword(Request $request){


         $request->validate([

            'current_password' => ['required','string','min:8'],
            'password' => ['required','string','min:8','confirmed']
    
        ]);

        $cuurent_passwordstatus = Hash::check($request->current_password,auth()->user()->password);

        if($cuurent_passwordstatus){

            User::findOrFail(Auth::user()->id)->update([
                'password'  => Hash::make($request->password)
            ]);

            return redirect()->back()->with('message','Password Update Successfully');
        }else{
            return redirect()->back()->with('message','Current Password Does not Match with Old Password');
        }
    }

}
