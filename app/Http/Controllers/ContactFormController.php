<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.contact');
    }

    public function store(){
        
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        try{
            Mail::to('silsilahdialogue@gmail.com')->send(new ContactFormMail($data));
        }catch(Exception $e){
            
            return redirect('/contact')->with('error', 'OOPS! Something went wrong! Please try again');
        }


        

        return redirect('/contact')->with('success', 'SUCCESS! Your message has been sent!');

    }
}
