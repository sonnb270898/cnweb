<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Classes;

use App\User;

use App\UserClass;

use App\Post;

use App\RepComment;

use App\Comment;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getAdminHome(){
        $admin = Admin::find(Auth::guard('admin')->id());
        $classes = Classes::all();
        return view('admin.index')->with(['admin'=>$admin,'classes'=>$classes]);
    }

    public function getClass($cid){
    	$admin = Admin::find(Auth::guard('admin')->id());
    	$class = Classes::find($cid);
    	return view('admin.class.class')->with(['class'=>$class,'admin'=>$admin]);
    }

    public function getEditClass($cid){
    	$admin = Admin::find(Auth::guard('admin')->id());
    	$class = Classes::find($cid);
    	return view('admin.class.editclass')->with(['class'=>$class,'admin'=>$admin]);
    }

    public function postEditClass(Request $request,$cid){
    	$admin = Admin::find(Auth::guard('admin')->id());
    	$class = Classes::find($cid);
    	$class->cname = $request->cname;
    	$class->creator = $request->creator;
    	$class->createdate = $request->createdate;
    	$class->save();
    	return redirect()->route('admin.class',['class'=>$class,'admin'=>$admin,'cid'=>$cid]);
    }

    public function getUserClass($cid){
    	$admin = Admin::find(Auth::guard('admin')->id());
    	$userClass = UserClass::where([['cid',$cid]])->get();
    	$class = Classes::find($cid);
    	return view('admin.user.user')->with(['class'=>$class,'userClass'=>$userClass,'admin'=>$admin]);
    }

    public function getEditUser($cid,$uid){
    	$user = User::find($uid);
    	$class = Classes::find($cid);
    	$admin = Admin::find(Auth::guard('admin')->id());
    	return view('admin.user.edituser')->with(['user'=>$user,'class'=>$class,'admin'=>$admin]);
    }
    // chưa sửa
       public function postEditUser(Request $request,$cid,$uid){
    	$user = User::find($uid);
    	$class = Classes::find($cid);
    	$admin = Admin::find(Auth::guard('admin')->id());

        // $validator=Validator::make($request->all(), 
        //     [
        //         "name"=>"required",
        //         "email"=>"required",
        //         'address' => 'required',
        //         'dob'=>'required',
        //     ], 
        //     [
        //         "name.required"=>"Thuộc tính tên còn thiếu",
        //         "email.required"=>"Thuộc tính Email còn thiếu",
        //         "address.required"=>"Thuộc tính địa chỉ còn thiếu",
        //         "dob.required"=>'Thuộc tính ngày sinh còn thiếu',
        //     ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->save();
    	return redirect()->route('admin.user',['cid'=>$cid])->with(['user'=>$user,'class'=>$class,'admin'=>$admin]);
    }

        public function getTopic($cid){
    	$class = Classes::find($cid);
    	$topic = Post::where([['cid',$cid]])->get();
    	$admin = Admin::find(Auth::guard('admin')->id());
    	return view('admin.topic.topic')->with(['class'=>$class,'admin'=>$admin,'topic'=>$topic]);
    }

    public function getEditTopic($cid,$pid){
    	$class = Classes::find($cid);
    	$topic = Post::find($pid);
    	$admin = Admin::find(Auth::guard('admin')->id());
    	return view('admin.topic.edittopic')->with(['class'=>$class,'admin'=>$admin,'topic'=>$topic]);
    }

    public function postEditTopic(Request $request,$cid,$pid){
    	$class = Classes::find($cid);
    	$topic = Post::find($pid);
    	$admin = Admin::find(Auth::guard('admin')->id());
        $topic->title=$request->title;
        $topic->content=$request->content;
        $image=$request->image;
        if($image!=null){
            $image->move(base_path('public/images'),$topic->id.".".$image->getClientOriginalExtension());
            $topic->image="images/".$topic->id.".".$image->getClientOriginalExtension();
            $topic->save();
        }
        $topic->save();
    	return redirect()->route('admin.topic',['cid'=>$cid])->with(['class'=>$class,'admin'=>$admin,'topic'=>$topic]);
    }

    public function getDelTopic($cid,$pid){
        $class = Classes::find($cid);
        $topic = Post::find($pid);
        $admin = Admin::find(Auth::guard('admin')->id());
        $topic->status = 1;
        $topic->save();
        return redirect()->route('admin.topic',['cid'=>$cid])->with(['class'=>$class,'admin'=>$admin,'topic'=>$topic]);
    }

    public function getDelUser($cid,$uid){
        $class = Classes::find($cid);
        $admin = Admin::find(Auth::guard('admin')->id());
        $userClass = UserClass::where([['cid',$cid]])->get();
        $u = UserClass::where(['uid'=>$uid,'cid'=>$cid])->get()->first();
        $u->status = 1;
        $u->save();
        return redirect()->route('admin.user',['cid'=>$cid])->with(['userClass'=>$userClass,'class'=>$class,'admin'=>$admin]);
    }
}
