<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\UserClass;

use App\Post;
use App\RepComment;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDiscussion($id){
    	$class=Classes::find($id);
    	$user = Auth::user();
        $userClass = UserClass::where([['uid',$user->id],['cid',$id]])->first();
        if(!$userClass || $userClass->status == 1)
            return redirect()->back();
    	return view("form",["class"=>$class,"user"=>$user]);
    }

    public function postDiscussion(Request $request, $id){
    	$post= new Post;
    	$post->title=$request->title;
    	$post->content=$request->content;
    	$post->uid=Auth::user()->id;
    	$post->cid=$id;
        $image=$request->image;
        if($image!=null){
            $image->move(base_path('public/images'),$post->id.".".$image->getClientOriginalExtension());
            $post->image="images/".$post->id.".".$image->getClientOriginalExtension();
            $post->save();
        }
    	$post->save();
    	return redirect()->back()->with("thongbao","Đăng thành công");
    }

    public function getViewDiscussion($id,$pid){
        $class=Classes::find($id);
        $user = Auth::user();
        $post = Post::find($pid);
        $userClass = UserClass::where([['uid',$user->id],['cid',$id]])->first();
        if(!$userClass || $userClass->status == 1)
            return redirect()->back();
        if($post->status == 0)
            return view("topic",["class" =>$class,"user"=>$user,"topic"=>$post]);
        return redirect()->back();
    }

    public function postComment(Request $request,$classid ,$pid){
        $cmt = new Comment;
        if($_POST['sub'] != 0){
            $cmt->content = $request->input($_POST['sub']);
            $cmt->status = 1;
        }else{
            $cmt->content = $request->content;
        }
        $cmt->uid = Auth::user()->id;
        $cmt->pid = $pid;
        $image=$request->image;
        if($image!=null){
            $image->move(base_path('public/images'),$cmt->id.".".$image->getClientOriginalExtension());
            $cmt->image="images/".$cmt->id.".".$image->getClientOriginalExtension();
            $cmt->save();
        } 
        $cmt->save();
        if($_POST['sub'] != 0){
            $rep = new RepComment;
            $rep->id = $cmt->id;
            $rep->repid = $_POST['sub'];
            $rep->save();
        }

        return redirect()->back();
    }
    public function getEditDiscussion(Request $request,$id,$pid){
        $class=Classes::find($id);
        $user = Auth::user();
        $post = Post::find($pid);
        $userClass = UserClass::where([['uid',$user->id],['cid',$id]])->first();
        if(!$userClass || $userClass->status == 1)
            return redirect()->back();
        if($user->id == $post->uid || $user->id == $class->creator)
            return view('editform',["class" =>$class,"user"=>$user,"post"=>$post,'id'=>$id,'pid'=>$pid]);
        return redirect()->back();
    }    
    public function postEditDiscussion(Request $request, $id,$pid){
        $class=Classes::find($id);
        $user = Auth::user();
        $post = Post::find($pid);
        $post->title=$request->title;
        $post->content=$request->content;
        $image=$request->image;
        if($image!=null){
            $image->move(base_path('public/images'),$post->id.".".$image->getClientOriginalExtension());
            $post->image="images/".$post->id.".".$image->getClientOriginalExtension();
            $post->save();
        }
        $post->save();
        return redirect('class/'.$id.'/discussion/'.$pid);
    }

    public function DelDiscussion($id,$pid){
        $class=Classes::find($id);
        $user = Auth::user();
        $post = Post::find($pid);
        if($user->id == $post->uid || $user->id == $class->creator){
            $post->status = 1;
            $post->save();
        }
        return redirect()->route("userlist",['id'=>$id]);
    }
    // public function comment(Request $request, $id){
    //     $comment=new Comment;
    //     $comment->content=$request->content;
    //     $comment->uid=Auth::user()->id;
    //     $comment->pid=$id;
    //     $comment->status=0;
    //     $comment->save();
    //     $image=$request->image;
    //     if($image!=null){
    //         $image->move(base_path('public/images'),$comment->id.".".$image->getClientOriginalExtension());
    //         $comment->image="images/".$comment->id.".".$image->getClientOriginalExtension();
    //         $comment->save();
    //     }
    //     return redirect()->back();
    // }
}
