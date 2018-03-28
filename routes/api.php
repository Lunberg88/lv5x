<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/user/permission', function(Request $request) {
           return $request->user()->admin;
        });
	//Candidates
	Route::get('/candidates', 'API\ApiCandidateController@showAllCandidatesList');
	Route::post('/candidates/addnew', 'API\ApiCandidateController@createNewCandidate');
	Route::get('/candidate/{id}', 'API\ApiCandidateController@viewCandidateProfile');
	//Openings
	Route::get('/openings', 'API\ApiOpeningsController@showAllOpeningsList');
	Route::get('/openings/{id}', 'API\ApiOpeningsController@viewOpeningsDetail');
	//History
	Route::get('/history', 'API\ApiHistoryController@showAllHistory');
	//Messages
	Route::get('/messages', 'API\ApiMessagesController@showAllMessages');
	Route::get('/messages/read/{id}', 'API\ApiMessagesController@readInboxMessage');
	Route::delete('/messages/delete/{id}', 'API\ApiMessagesController@deleteMessage');
});