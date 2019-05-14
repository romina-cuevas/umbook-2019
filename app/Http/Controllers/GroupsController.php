<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Group;
use Exception;
use Laracasts\Flash\Flash;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $friends = Auth::user()->friends->pluck('name','id');
        //dd($friends);
        return view('groups.create')->with('friends', $friends);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $group = new Group($request->all());
        $group->user_id = \Auth::user()->id;
        $group->save();
        $group->friends()->sync($request->friends);
        //dd($group,$group->friends);
        flash('Se creado el grupo ' . $group->name)->success();
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = Group::find($id);
        $friends = Auth::user()->friends->pluck('name','id');
        $group_friends=$group->friends->pluck('id')->ToArray();
        //dd($group_friends);
        return view('groups.edit')->with('group',$group)->with('friends',$friends)->with('group_friends',$group_friends);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $group = Group::find($id);
        $group->fill($request->all());
        $group->save();
        $group->friends()->sync($request->friends);
        flash('Se a editado el grupo ' . $group->name)->success();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $group = Group::find($id);
        flash('Se a eliminado el grupo ' . $group->name)->error();
        $group->delete();
        return redirect()->route('home');
    }
}
