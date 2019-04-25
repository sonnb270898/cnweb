<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\UserClass;

use App\Post;

use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    //
    public function getClass($id){
    	$class=Classes::find($id);
    	$user=Auth::user();
    	return view("topic",["class"=>$class,"user"=>$user]);
    }

    public function getJoinClass(){
    	$user=Auth::user();
    	return view("join",["user"=>$user]);
    }

    public function postJoinClass(Request $request){
    	$userClass=UserClass::where([["uid",Auth::user()->id],["cid",$request->class]])->get()->first();
    	if (!is_null($userClass)) return redirect()->back()->with("tontai","Bạn đã là thành viên của lớp này rồi");
    	$class=Classes::find($request->class);
    	if ($class!=null && $class->enroll==$request->enroll) {
    		$userClass= new UserClass;
    		$userClass->uid=Auth::user()->id;
    		$userClass->cid=$request->class;
    		$userClass->save();
    		return redirect()->back()->with("thongbao","Bạn đã là thành viên của lớp ".$request->class);
    	}
    	return redirect()->back()->with("thatbai","Mã lớp hoặc mã kích hoạt không chính xác");
    }

    // public function getDiscussion($id){
    // 	$class=Classes::find($id);
    // 	$user=Auth::user();
    // 	return view("form",["class"=>$class,"user"=>$user]);
    // }

    // public function postDiscussion(Request $request, $id){
    // 	$post= new Post;
    // 	$post->title=$request->title;
    // 	$post->content=$request->content;
    // 	$post->uid=Auth::user()->id;
    // 	$post->cid=$id;
    // 	$post->save();
    // 	return redirect("class/".$id)->with("thongbao","Đăng thành công");
    // }
}
