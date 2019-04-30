<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //

    public function principal(){
    	return view('home');
    }

    public function welcome(){
    	return view('welcome');
    }
}
