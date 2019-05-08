<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepComment extends Model
{
    //
    public $timestamps=false;
    protected $table="rep_cmt";

    public function comment(){
    	return $this->belongsTo(Comment::class,"id","id");
    }

}
