<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\CantactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{
    public function mail(Request $request){


        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $body_message = $request->body_message;

       

        Mail::to('asraful8264@gmail.com')->send(new CantactMail($name ,$email,$subject,$body_message));

        return redirect()->back()->with('message','Your Message Send Successfuly');
    }
}
