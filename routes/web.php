<?php

/*
Route::get('/', function () {
    return view('layouts.app');
})->middleware('auth');
*/

Route::get('/', 'IndexController@index')->name('main');
Route::get('/openings', 'IndexController@openings')->name('openings');


Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('/admin/candidate/{id}', 'AdminController@show');
	Route::get('/admin/search', 'AdminController@search')->name('search');
	Route::get('/admin/openings', 'AdminController@openings');
	Route::get('/admin/profile/{name}', 'AdminController@profile')->name('profile');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
        Route::resource('admin', 'AdminController');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('/group', 'GroupController@index')->name('group');
	Route::post('/group/delete', 'GroupController@delete')->name('delete');
	Route::get('/group/create', 'GroupController@create')->name('create');
	Route::post('/group/store', 'GroupController@store')->name('store');
	Route::post('/group/update', 'GroupController@update')->name('update');
	Route::get('/group/{id}', 'GroupController@group');
	Route::post('/group/invite', 'GroupController@invite')->name('invite');
	Route::post('/group/kill', 'GroupController@kill')->name('kill');
	Route::post('/group/changeowner', 'GroupController@changeowner')->name('changeowner');
});

Route::group(['middleware' => ['auth']], function(){
	Route::resource('posts', 'PostsController');
});

Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'))->middleware('auth');

Auth::routes();
/*
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
*/

Route::get('/home', 'HomeController@index');




