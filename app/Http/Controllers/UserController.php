<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\UserClass;

use Illuminate\Support\Facades\View;

class UserController extends Controller
{	
	
    function user(){
    	$user=Auth::user();
    	return view("user",["user"=>$user]);
    }

    public function getProfile(){
    	$user=Auth::user();
    	$userClass=UserClass::where([["uid",Auth::user()->id]])->get()->first();
    	if(!$userClass){
    		return redirect()->route('join')->with("thatbai","Vui lòng tham gia 1 lớp học");
    	}
    	return view("profile",["user"=>$user]);

    }
}
