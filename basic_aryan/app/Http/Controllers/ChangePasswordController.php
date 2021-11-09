<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Image;

class ChangePasswordController extends Controller
{
   public function Cpassword()
   {
       return view('admin.body.change_password');
   }
   public function PasswordUpdate(Request $request)
   {
       $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Chanage Successfuly');

        }else{
            return redirect()->back()->with('error','Current Password IS Invalid');
        }
   }

   public function ProfileUpdate(){

    if(Auth::user()){
        $user = User::find(Auth::user()->id);
        if($user){
            return view('admin.body.update_profile', compact('user') );
        }

    }
   }

   public function userProfileUpdate(Request $request )
   {
       $user=User::find(Auth::user()->id);
      
       if($user){

           
        $user->name=$request['name'];
        $user->email=$request['email'];
       

        $user->save();
        return Redirect()->back()->with('success','user profile is update');
       }else{
           return redirect()->back()->with('error','user profile is not update');
       }
   }
}
