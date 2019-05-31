<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes;

use App\User;

use App\UserClass;

use App\Post;

use App\RepComment;

use App\Comment;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AjaxController extends Controller
{
    //
    public function getComment(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $user=User::find(Auth::user()->id);
        $comment=new Comment;
        $comment->content=$request->content;
        $comment->uid=Auth::user()->id;
        $comment->pid=$request->pid;
        $comment->status=0;
        $comment->save();
        $image=$request->file;
        if($image!=null){
            $image->move(base_path('public/images'),$comment->id.".".$image->getClientOriginalExtension());
            $comment->image="images/".$comment->id.".".$image->getClientOriginalExtension();
            $comment->save();
        }
        echo '<div class="form-group" style="margin-left: 15px">
              <div class="username">'.$user->name.'</div>
              <div style="font-size: 12px;">'.$current_date_time.'</div>
              <div class="comment">'.$comment->content.'</div>';
        if($comment->image!=null) echo '<img src="'.$comment->image.'" style="max-height: 150px;">';
        echo     '<div class="rep" id="rep'.$comment->id.'"><a>reply</a></div>
            </div>
              <div class="container form-group" >
                <div id="a'.$comment->id.'">
                </div>
                <div class="row" style="display:none" id="inp'.$comment->id.'">
                    <div class="col-md-11 inputrep input-group" >
                      <input type="text" class="form-control" name="'.$comment->id.'" id="content'.$comment->id.'">
                      <span class="input-group-btn">
                        <input type="button" class="btn btn-primary send" id="send'.$comment->id.'" value="Gửi">
                      </span>                          
                    </div>         
                </div>    
              </div>';
    }
    
    function repcomment(Request $request){
        $current_date_time = Carbon::now()->toDateTimeString();
        $user=User::find(Auth::user()->id);
        $comment= new Comment;
        $comment->content=$request->content;
        $comment->uid=Auth::user()->id;
        $comment->pid=$request->pid;
        $comment->status=1;
        $comment->save();
        $image=$request->file;
        if($image!=null){
            $image->move(base_path('public/images'),$comment->id.".".$image->getClientOriginalExtension());
            $comment->image="images/".$comment->id.".".$image->getClientOriginalExtension();
            $comment->save();
        }
        $rep= new RepComment;
        $rep->id=$comment->id;
        $rep->repid=$request->id;
        $rep->save();
        echo '<div>
            <div class="username">'.$user->name.'</div>
            <div style="font-size: 12px;">'.$current_date_time.'</div>
            <div class="comment">'.$request->content.'</div>';
        if($comment->image!=null) echo '<img src="'.$comment->image.'" style="max-height: 150px;">';    
        echo    '</div>';
    }

}
