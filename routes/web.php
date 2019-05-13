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
	Route::get('/search', 'UsersController@search')->name('users.search');
});

	







