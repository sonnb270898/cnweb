<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps=false;
    protected $table="post";

    public function comment(){
    	return $this->hasMany(Comment::class,"pid","id");
    }

    public function u(){
        return $this->belongsTo(User::class,'uid','id');
    }

}
