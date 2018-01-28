<?php

Route::get('/', 'IndexController@index')->name('main');
Route::get('/openings', 'IndexController@openings')->name('index.openings');
Route::get('/blog', 'IndexController@blog')->name('index.blog');
Route::get('/blog/{slug}', 'IndexController@showblog')->name('index.blog.show');
Route::post('/send-msg', 'IndexController@sendMessage')->name('index.send.msg');

Route::group(['middleware' => 'auth'], function() {
	Route::post('/openings/addfav', 'OpeningsController@addfav');
	Route::get('/myfavs', 'IndexController@myfavourites')->name('index.profile.favs');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('/admin/candidates', 'CandidateController@index')->name('admin.candidates');
	Route::get('/admin/candidates/new', 'CandidateController@create')->name('admin.candidates.create');
	Route::post('/admin/candidates/new', 'CandidateController@store')->name('admin.candidates.store');
	Route::get('/admin/candidates/candidate-{id}', 'CandidateController@show')->name('admin.candidates.show.id');
	Route::get('/admin/candidates/edit/{id}', 'CandidateController@edit')->name('admin.candidates.edit.id');
	Route::put('/admin/candidates/update/{id}', 'CandidateController@update')->name('admin.candidates.update');
	Route::delete('/admin/candidates/destroy/{id}', 'CandidateController@destroy')->name('admin.candidates.destroy');
	Route::get('/admin/candidates/search', 'CandidateController@search')->name('admin.candidates.search');

	Route::get('/admin/openings', 'OpeningsController@index')->name('admin.openings');
	Route::get('/admin/openings/new', 'OpeningsController@create')->name('admin.openings.create');
	Route::post('/admin/openings/new', 'OpeningsController@store')->name('admin.openings.store');
	Route::get('/admin/openings/opening-{id}', 'OpeningsController@show')->name('admin.openings.show.id');
	Route::get('/admin/openings/edit/{id}', 'OpeningsController@edit')->name('admin.openings.edit.id');
	Route::put('/admin/openings/update/{id}', 'OpeningsController@update')->name('admin.openings.update');
	Route::get('/admin/openings/search', 'OpeningsController@search')->name('admin.openings.search');
	Route::delete('/admin/openings/destroy/{id}', 'OpeningsController@destroy')->name('admin.openings.destroy');

	Route::get('/admin', 'AdminController@index')->name('admin.index');

	Route::get('/admin/candidate/{id}', 'AdminController@show')->name('admin.candidate.show');
	Route::get('/admin/search', 'AdminController@search')->name('admin.search');
	Route::get('/admin/profile/{name}', 'AdminController@profile')->name('admin.profile');

	Route::get('/admin/blog', 'BlogController@dashboard')->name('admin.blog.dashboard');
	Route::get('/admin/blog/create', 'BlogController@create')->name('admin.blog.create');
	Route::post('/admin/blog/create', 'BlogController@store')->name('admin.blog.store');
	Route::get('/admin/blog/edit/{?id}', 'BlogController@edit')->name('admin.blog.edit');
	Route::put('/admin/blog/update/{?id}', 'BlogController@update')->name('admin.blog.update');
	Route::get('/admin/blog/view-{?id}', 'BlogController@view')->name('admin.blog.view');
	Route::delete('/admin/blog/destroy/{id}', 'BlogController@destroy')->name('admin.blog.destroy');

	Route::get('/admin/history', 'AdminController@history')->name('admin.history');

	Route::get('/admin/msg', 'AdminController@msg')->name('admin.msg.list');
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

Route::get('auth/fb', 'FbController@redirectToProvider');
Route::get('auth/fb/callback', 'FbController@handleProviderCallback');
/*
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
*/

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/test', 'ModerController@index')->name('index.moder.index');
	Route::get('/test/add', 'ModerController@create')->name('index.moder.add');
	Route::post('/test/add', 'ModerController@add')->name('index.moder.store');
});







