<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','InicioController@principal');
Route::get('/','InicioController@welcome')->name('welcome');

Route::group(['prefix'=>'member','middleware'=>['auth']], function(){
	Route::get('/','InicioController@principal')->name('member.home');
	Route::any('/search', 'UsersController@search')->name('users.search');
	Route::get('/addfriend', 'UsersController@addFriend')->name('add.friend');
	Route::get('/friends', 'UsersController@indexFriends')->name('friends.index');
    Route::any('/search', 'UserController@search')->name('users.search');
    Route::get('/addfriend', 'UserController@addFriend')->name('add.friend');
    Route::get('/friend_requests', 'UserController@indexFriendRequests')->name('friends.requests');
    Route::get('/friends', 'UserController@indexFriends')->name('friends.index');
    Route::get('/confirm_request', 'UserController@confirmFriend')->name('confirm.friend');
	Route::resource('groups','GroupsController');
	Route::get('group/{id}/destroy',[
		'uses'=>'GroupsController@destroy',
		'as'=>'group.destroy'
	]);
});

	







