<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    public function circles(){
    	return $this->belongsToMany('App\Circle');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
