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
}
