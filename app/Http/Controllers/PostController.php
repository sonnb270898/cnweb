<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\UserClass;

use App\Post;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDiscussion($id){
    	$class=Classes::find($id);
    	$user = Auth::user();
    	return view("form",["class"=>$class,"user"=>$user]);
    }

    public function postDiscussion(Request $request, $id){
    	$post= new Post;
    	$post->title=$request->title;
    	$post->content=$request->content;
    	$post->uid=Auth::user()->id;
    	$post->cid=$id;
    	$post->save();
    	return redirect("class/".$id)->with("thongbao","Đăng thành công");
    }
}
