<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    function login()
    {
    	return response(['message'=>md5(Auth::user()->email)],200);
    }
}
