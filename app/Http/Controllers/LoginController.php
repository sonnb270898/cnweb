<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserClass;
use App\Admin;
use Validator;
class LoginController extends Controller
{
    public function getLogin(){
        if(Auth::check()){
            return redirect('/');
        }
    	return view('login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
    		$userClass=UserClass::where([["uid",Auth::user()->id]])->get()->first();
            if($userClass == null){
                return redirect()->route('join');
            }else{
                return redirect("/");
            }
    	}else{
    		return redirect()->back();
    	}
	}

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

    public function getSignUp(){
        return view("signup");
    }

    public function postSignUp(Request $request){
        $validator=Validator::make($request->all(), 
            [
                "username"=>"unique:users,username",
                "email"=>"unique:users,email",
                'password' => 'required_with:confirm|same:confirm'
            ], 
            [
                "username.unique"=>"Tên đăng nhập đã tồn tại",
                "email.unique"=>"Email đã tồn tại",
                "password.same"=>"Mật khẩu không khớp"
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user= new User;
        $user->username=$request->username;
        $user->password=bcrypt($request->password);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->save();
        return redirect("login")->with("thongbao","Tạo tài khoản thành công");
    }


    public function addAdmin(){
        $admin = Admin::find(1);
        $admin->username = 'admin';
        $admin->password=bcrypt('admin');
        $admin->save();
        return redirect('admin/login');
    }

    public function getAdminLogin(){
        if(Auth::guard('admin')->check())
            return redirect('admin/');
        return view('admin.login');
    }
    public function postAdminLogin(Request $request){
        if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password])){
            return  redirect()->route('admin.home');
        }
        return redirect()->back();
    }


}
