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
Route::get('/userlist','UserList@index')->name('userlist');
Route::get('/userlist/add/{userto}', 'UserList@addfriend')->name('userlist.addfriend');
Route::get('/userlist/remove/{userto}', 'UserList@removefriend')->name('userlist.removefriend');


Route::post('/post/add','PostController@create')->name('post.add');
Route::get('/post/index', 'PostController@index')->name('post');
Route::get('/post/remove/{postid}', 'PostController@delete')->name('post.remove');
Route::post('/post/edit', 'PostController@update')->name('post.update');
