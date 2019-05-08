<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\UserClass;

use App\Post;

use App\User;

use Illuminate\Support\Facades\Auth;
use Validator;
use DateTime;
class ClassController extends Controller
{
    
    public function getClass($id){
    	return redirect()->route("userlist",['id'=>$id]);
    }
    public function getClassInfo($id){
        $class = Classes::find($id);
        $classes = Classes::all();
        $creator = User::find($class->creator);
        $user = Auth::user();
        return view("classinfo",['user'=>$user,'creator'=>$creator,'class'=>$class,'classes'=>$classes]);
    }

    public function getJoinClass(){
    	$user=Auth::user();
    	return view("join",["user"=>$user]);
    }

    public function postJoinClass(Request $request){
    	$class = Classes::where([['id',$request->cid]])->get()->first();
    	if ($class != null && $class->enroll == $request->enroll) {
            $userClass=UserClass::where([["uid",Auth::user()->id],["cid",$class->id]])->get()->first();
            if (!is_null($userClass)) 
                return redirect()->back()->with("tontai","Bạn đã là thành viên của lớp này rồi");
    		$userClass= new UserClass;
    		$userClass->uid=Auth::user()->id;
    		$userClass->cid=$class->id;
    		$userClass->save();
    		return redirect()->back()->with("thongbao","Tham gia vào lớp thành công".$request->class);
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
    public function getCreateClass(){
        $user = Auth::user();
        $class = Classes::all();
        return view("newclass",["user"=>$user,"class"=>$class]);
    }

    public function postCreateClass(Request $request){
        $class = Classes::where([['cname',$request->class]])->get()->first();

        $validator=Validator::make($request->all(), 
            [
                "cname"=>"required",
                "enroll"=>"required",
            ], 
            [
                'cname.required' => 'Hãy điền tên lớp còn thiếu',
                'enroll.required' => 'Hãy điền mã enroll còn thiếu',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($class == null) {
            $newclass= new Classes;
            $now = new DateTime;
            $newclass->cname=$request->cname;
            $newclass->enroll=$request->enroll;
            $newclass->creator=Auth::user()->id;
            $newclass->save();
            return redirect()->back()->with("thongbao","Tạo thành công lớp ".$request->class);
        }
        return redirect()->back()->with("thatbai","Lớp đã tồn tại");
    }

}
