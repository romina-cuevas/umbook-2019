<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use Exception;

class UsersController extends Controller
{
    public function search()
    {
        $search = Input::get('name_search');

        if (empty($search)) {
            throw new Exception("Nombre o apellido no proporcionado");
        }

        $users = User::query()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->where('id', '!=', Auth::id())
            ->get();

        if (count($users)) {
            return view('home')->with('users', $users)->withQuery($search);
        } else {
            return view('home')->withMessage('Sin coincidencias. Intenta nuevamente');
        }
    }

    public function addFriend(Request $request)
    {
        $actual_user = Auth::user();
        $friend = User::findOrFail($request->get('friend'));

        $actual_user->friends()->attach($friend);

        return redirect()->route('friends.index');
    }

    public function indexFriends()
    {
        $actual_user = Auth::user();

        return view('friends')->with('friends', $actual_user->friends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
