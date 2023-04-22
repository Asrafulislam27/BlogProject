<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function edit($user_id){
        $user = User::find($user_id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $user_id){
        $user = User::find($user_id);
        if($user){
            $user->role_as = $request->role_as;
            $user->update();

            $notification = array(
                'message' => 'User Update Successfully',
                'alert-type' => 'success'
            );
    
            return redirect('admin/users')->with($notification);
        }

        $notification = array(
            'message' => ' No User Found',
            'alert-type' => 'success'
        );
        return redirect('admin/users')->with($notification);
    }
}
