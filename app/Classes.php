<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table="class";
    public $timestamp=false;
    
    public function post(){
    	return $this->hasMany(Post::class,"cid","id");
    }
}
