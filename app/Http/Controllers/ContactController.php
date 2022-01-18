<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function contact()
    {
        return view('contact');
    }


    public function sendEmail(Request $request)
    {   
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|max:50'
        ]);
        

        Mail::to('probando@gmail.com')->send(new ContactMail($request->all()));
        return back()->with('messagesend','Su mensaje ha sido enviado');
    }
}
