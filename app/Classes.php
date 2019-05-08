<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table="class";
    public $timestamps=false;
    
    public function post(){
    	return $this->hasMany(Post::class,"cid","id");
    }
    public function u(){
    	return $this->beLongsTo(User::class,"creator","id");
    }
}
