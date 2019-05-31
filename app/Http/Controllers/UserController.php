<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\UserClass;
use App\Classes;
use Illuminate\Support\Facades\View;
use Validator;
class UserController extends Controller
{	
	
    public function user(){
    	$user=Auth::user();
        $userClass=UserClass::where([["uid",Auth::user()->id]])->get()->first();
        if(!$userClass){
            return redirect()->route('join')->with("thatbai","Vui lòng tham gia 1 lớp học");
        }
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
    public function postProfile(Request $request){

        $validator=Validator::make($request->all(), 
            [
                "name"=>"required",
                "email"=>"required",
                'address' => 'required',
                'dob'=>'required',
            ], 
            [
                "name.required"=>"Thuộc tính tên còn thiếu",
                "email.required"=>"Thuộc tính Email còn thiếu",
                "address.required"=>"Thuộc tính địa chỉ còn thiếu",
                "dob.required"=>'Thuộc tính ngày sinh còn thiếu',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->save();
        return redirect('/');
    }

        public function getlist($id){
            $user = Auth::user();
            $userClass=UserClass::where([["cid",$id]])->get()->all();
            $class = Classes::find($id);
            $uc = UserClass::where([['uid',$user->id],['cid',$id]])->first();
            if(!$uc || $uc->status == 1)
                return redirect()->back();
            return view("userlist",["userclass"=>$userClass,'user'=>$user,'class'=>$class]);
    }
}
