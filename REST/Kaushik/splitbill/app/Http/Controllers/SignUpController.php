<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Hash;


class SignUpController extends Controller
{
    //
    public function register(Request $request)
    {
    	if($request->has('email')&&$request->has('name')&&$request->has('password')){
	    	if($request->email!=''&&$request->name!=''&&$request->password!=''){
	    		$email=$request->email;
		    	$password=$request->password;
		    	$name=$request->name;
		    	$user=User::create([
		            'name' => $name,
		            'email' => $email,
		            'password' => Hash::make($password)
		        ]);
		    	if($user){
		    		return response(['message'=>'register successfully'],200);
		    	}
		    	else{
		    		return response(['message'=>'cannot process data3'],422);

		    	}
		    }else{
		    		return response(['message'=>'cannot process data2'],422);

		    }
	    }else{
	    		return response(['message'=>'cannot process data1'],422);

	    }
    	
    }
}
