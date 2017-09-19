<?php
Route::get('/', function () {
    return view('layouts.app');
})->middleware('auth');

Route::get('/admin/search', 'AdminController@search')->name('search');

Route::get('/profile/{name}', 'AdminController@profile')->name('profile');

Route::get('/admin/candidate-{id}', 'AdminController@show');

Route::group(['middleware' => ['auth']], function(){
   Route::resource('posts', 'PostsController');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('admin', 'AdminController');
});

Route::group(['middleware' => ['cors']], function() {
	Route::resource('main', 'MainController');
});

Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'))->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index');




