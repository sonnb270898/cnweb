<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
    //
	protected $table="user_class";

	protected $primaryKey = 'uid';

    public $timestamps=false;

    public function class(){
    	return $this->hasOne(Classes::class,"id","cid");
    }
    public function user(){
        return $this->belongsTo(User::class,'uid','id');
    }
}
