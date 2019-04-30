<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //return view('home');
        if($request->user()->type == 'admin'){
            return view('admin.index');
        }elseif ($request->user()->type == 'member') {
            return redirect()->route('member.home');
        }
    }
}
