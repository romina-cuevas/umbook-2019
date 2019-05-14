<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use Exception;

class UserController extends Controller
{
    public function search()
    {
        $search = Input::get('name_search');

        if (empty($search)) {
            throw new Exception("Nombre o apellido no proporcionado");
        }

        $users = User::query()
            ->where('first_name', 'LIKE', '%'.$search.'%')
            ->orWhere('last_name', 'LIKE', '%'.$search.'%')
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
        /** @var User $actual_user */
        $actual_user = Auth::user();
        $friend = User::findOrFail($request->get('friend'));

        try {
            $actual_user->friends()->attach($friend);
        } catch (QueryException $exception) {
            return view('home')->with('message', 'Ya eres amigo de: ' . $friend->first_name . $exception->getMessage());
        }

        return redirect()->route('friends.index');
    }

    public function indexFriends()
    {
        /** @var User $actual_user */
        $actual_user = Auth::user();
        $friends = DB::table('friends')
            ->where('user_id', '=', $actual_user->id)
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('friends.*', 'users.first_name')
            ->get();

        return view('friends')->with('friends', $friends);
    }

    public function indexFriendRequests()
    {
        /** @var User $actual_user */
        $actual_user = Auth::user();
        $friend_requests = DB::table('friends')
            ->where('friend_id', '=', $actual_user->id)
            ->where('accepted', '=',0)
            ->join('users', 'friends.user_id', '=', 'users.id')
            ->select('friends.*', 'users.first_name')
            ->get();

        return view('friend_requests')->with('friend_requests', $friend_requests);
    }

    public function confirmFriend(Request $request)
    {
        /** @var User $actual_user */
        $actual_user = Auth::user();
        $friend_id = $request->get('user_id');

        DB::table('friends')
            ->where('user_id', $friend_id)
            ->where('friend_id', $actual_user->id)
            ->update(['accepted' => 1]);

        DB::table('friends')->insert([
            'user_id' => $actual_user->id,
            'friend_id' => $friend_id,
            'accepted' => 1,
        ]);

        return self::indexFriends();
    }
}
