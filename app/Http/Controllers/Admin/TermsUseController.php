<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermsUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsUseController extends Controller
{
    public function terms(){
        $terms = TermsUse::first();
        return view('admin.termsuse.index',compact('terms'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'terms_name' => 'required',
            'terms_description' => 'required',

        ]);
        
        $terms = TermsUse::first();

        $terms->terms_name = $request->terms_name;
        $terms->terms_description = $request->terms_description;

        $terms->update();

        $notification = array(
            'message' => 'Terms Of Use Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }
}
