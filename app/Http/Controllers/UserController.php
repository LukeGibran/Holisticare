<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id){

        // if(!$id != Auth::user()->id){
        //     return redirect('/user/'.$id.'/edit')->with('error', 'ERROR! Access denied!');
        // }
        $user = User::findOrFail($id);

        return view('user.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        
   
        if(!Hash::check($request->input('mirror_pw'), Auth::user()->password)){
            return redirect('/user/'.$id.'/edit')->with('error', 'ERROR! The confirmation password is not valid');
        } 

      $user = User::findOrFail($id);

      $user->name = $request->name;
      $user->email = $request->email;
      $request->pw1 == null ? '' : $user->password = Hash::make($request->pw1);

      if($request->hasFile('image')){

            // Delete if user has an image

            if($user->image){
                Storage::delete('public/uploads/'.$user->image);
            }

           //get filename with extension
           $filenamewithextension = $request->file('image')->getClientOriginalName();
      
           //get filename without extension
           $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
           //get file extension
           $extension = $request->file('image')->getClientOriginalExtension();
     
           //filename to store
           $filenametostore = $filename.'_'.time().'.'.$extension;
     
           //Upload File
           $request->file('image')->storeAs('public/uploads', $filenametostore);

           $user->image =  $filenametostore;

      }

      $user->save();

      return redirect('/user/'.$id.'/edit')->with('updated', 'UPDATED! Your information has been successfully updated!');

        
    }


}
