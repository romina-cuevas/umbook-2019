<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    //
    protected $table = "circles";

    protected $fillable = ['name','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function friends(){
    	return $this->belongsToMany('App\Friend')->withTimestamps();
    }	
}
