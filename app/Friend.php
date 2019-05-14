<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    public function groups(){
    	return $this->belongsToMany('App\Group');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
