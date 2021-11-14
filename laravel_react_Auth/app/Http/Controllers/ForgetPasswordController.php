<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetRequest;
use App\Mail\ForgetMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
   public function ForgetPassword(ForgetRequest $request)
   {
       	$email = $request->email;

    	if (User::where('email',$email)->doesntExist()) {
    		return response([
    			'message' => 'Email Invalid'
    		],401);
    	}
        //generate Random  token
        $token=rand(10,100000);
        try{

            DB::table('password_resets')->insert([
                'email'=>$email,
                'token'=>$token,
            ]);

            //mail send to user
            Mail::to($email)->send(new ForgetMail($token));
            return response([
                'message'=>'Reset Password Mail send on Your Email',
            ],200);
            
        }catch(Exception $exception){
	    		return response([
	    			'message' => $exception->getMessage()
	    		],400);
	    	}



       
   }//end method
}
