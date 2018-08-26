<?php
/**
 * Guest routes
 */
Route::get('/', 'IndexController@index')->name('main');
Route::get('/about', 'IndexController@aboutPage')->name('main.about');
Route::get('/openings', 'IndexController@openings')->name('index.openings');
Route::get('/openings/{slug}', 'IndexController@showOpening')->name('index.show.opening');
Route::post('/openings', 'IndexController@openings')->name('index.sort.opening');
Route::get('/notes', 'IndexController@notes')->name('index.notes');
Route::get('/notes/{slug}', 'IndexController@showNote')->name('index.note.show');
Route::post('/send-msg', 'IndexController@sendMessage')->name('index.send.msg');

/**
 * Auth user routes
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'IndexController@userProfile')->name('user.profile');
    Route::post('/profile/update', 'IndexController@updateUserProfile')->name('user.profile.update');
    Route::get('/profile/applied', 'IndexController@userAppliedOpenings')->name('user.applied.openings');
	Route::post('/openings/addfav', 'OpeningsController@addfav');
	Route::get('/myfavs', 'IndexController@myfavourites')->name('index.profile.favs');
	Route::post('/openings/apply_opening', 'OpeningsController@applyOpening')->name('user.apply.opening');
});

/**
 * Admin routes
 */
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', 'AdminController@indexPage')->name('admin.main');
    //Candidates
	Route::get('/admin/candidates', 'CandidateController@index')->name('admin.candidates');
	Route::get('/admin/candidates/new', 'CandidateController@create')->name('admin.candidates.create');
	Route::post('/admin/candidates/new', 'CandidateController@store')->name('admin.candidates.store');
	Route::get('/admin/candidates/candidate/{id}', 'CandidateController@show')->name('admin.candidates.show.id');
	Route::get('/admin/candidates/edit/{id}', 'CandidateController@edit')->name('admin.candidates.edit.id');
	Route::put('/admin/candidates/update/{id}', 'CandidateController@update')->name('admin.candidates.update');
	Route::delete('/admin/candidates/destroy/{id}', 'CandidateController@destroy')->name('admin.candidates.destroy');
	Route::get('/admin/candidates/search', 'CandidateController@search')->name('admin.candidates.search');

	//Openings
	Route::get('/admin/openings', 'OpeningsController@index')->name('admin.openings');
	Route::get('/admin/openings/new', 'OpeningsController@create')->name('admin.openings.create');
	Route::post('/admin/openings/new', 'OpeningsController@store')->name('admin.openings.store');
	Route::get('/admin/openings/opening/{id}', 'OpeningsController@show')->name('admin.openings.show.id');
	Route::get('/admin/openings/edit/{id}', 'OpeningsController@edit')->name('admin.openings.edit.id');
	Route::put('/admin/openings/update/{id}', 'OpeningsController@update')->name('admin.openings.update');
	Route::get('/admin/openings/search', 'OpeningsController@search')->name('admin.openings.search');
	Route::delete('/admin/openings/destroy/{id}', 'OpeningsController@destroy')->name('admin.openings.destroy');
	Route::delete('/admin/openings/reject', 'OpeningsController@rejectCandidate')->name('openings.applied.reject');

	//Index
	Route::get('/admin', 'AdminController@index')->name('admin.index');

	Route::get('/admin/candidate/{id}', 'AdminController@show')->name('admin.candidate.show');
	Route::get('/admin/search', 'AdminController@search')->name('admin.search');
	Route::get('/admin/profile/{name}', 'AdminController@profile')->name('admin.profile');

	//Blog
	Route::get('/admin/blog', 'BlogController@dashboard')->name('admin.blog.dashboard');
	Route::get('/admin/blog/create', 'BlogController@create')->name('admin.blog.create');
	Route::post('/admin/blog/create', 'BlogController@store')->name('admin.blog.store');
	Route::get('/admin/blog/edit/{id}', 'BlogController@edit')->name('admin.blog.edit');
	Route::put('/admin/blog/update/{id}', 'BlogController@update')->name('admin.blog.update');
	Route::get('/admin/blog/view-{id}', 'BlogController@view')->name('admin.blog.view');
	Route::delete('/admin/blog/destroy/{id}', 'BlogController@destroy')->name('admin.blog.destroy');

	//Opening offers
	Route::get('/admin/opening_offer', 'HotOpeningOfferController@index')->name('admin.opening_offer.main');
    Route::post('/admin/opening_offer/send_mail', 'HotOpeningOfferController@sendMail')->name('admin.opening_offer.send_mail');

    //History
	Route::get('/admin/history', 'AdminController@history')->name('admin.history');

	//Messages
	Route::get('/admin/msg', 'AdminController@msg')->name('admin.msg.list');
	Route::post('/admin/msg/read', 'AdminController@msgRead')->name('msg.read.msg');
	Route::post('/admin/msg/reply', 'AdminController@replyToCandidate')->name('msg.reply');

	//Core Settings
	Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings');
	Route::put('/admin/settings/update', 'AdminController@settingsUpdate')->name('admin.settings.update');

	//Admin profile
    Route::get('/admin/profile', 'AdminController@showAdminProfile')->name('admin.profile.index');
    Route::post('/admin/profile/update', 'AdminController@adminProfileUpdate')->name('admin.profile.update');

    //Admin notifications
    Route::post('/admin/notif/read', 'AdminController@markAsReadNotification')->name('admin.read.notification');
});

Auth::routes();

Route::get('/home', 'HomeController@index');










