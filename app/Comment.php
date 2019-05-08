<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps=false;
    protected $table="comment";

    public function user(){
        return $this->belongsTo(User::class,'uid','id');
    }
    public function post(){
        return $this->belongsTo(Post::class,'pid','id');
    }
    public function rep_cmt(){
        return $this->hasMany(RepComment::class,"repid","id");
    }

}
