<?php

Route::get('/', function () {
    return view('layouts.app');
})->middleware('auth');

/*
Route::group(['middleware' => ['auth']], function(){
   Route::resource('posts', 'PostsController');
});
*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('admin', 'AdminController');
});

Route::post('posts/changeStatus', array('as' => 'changeStatus', 'uses' => 'PostsController@changeStatus'))->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index');




