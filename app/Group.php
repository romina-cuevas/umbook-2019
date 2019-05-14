<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $table = "grp";

    protected $fillable = ['name','user_id'];

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function friends(){
    	return $this->belongsToMany('App\Friend')->withTimestamps();
    }
}
