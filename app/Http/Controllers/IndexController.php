<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Messages;
use App\Openings;
use App\Traits\UserProfileInfo;
use App\User;
use App\UserFavs;
use Auth;
use App\Blog;
use App\Traits\Hollidays;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	use Hollidays, UserProfileInfo;

	/**
	 * Display homepage
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
    	//$cur_day = date('d.m');
    	//$days = Hollidays::checkdate($cur_day);
    	$openings = Openings::latest()
	                        ->take(3)
	                        ->get();

		    return view('index.pages.main', [
		    	'openings' => $openings,
			    'user_favs' => UserProfileInfo::userFavs(),
			    'user_profile' => UserProfileInfo::userProfile(),
		    ]);

    }

	/**
	 * Display openings for auth, guests
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function openings()
    {
    	$openings = Openings::where('status', '=', '1')
	                        ->paginate(9);
	    $days = Hollidays::checkdate(date('d.m'));

    	return view('index.pages.openings', [
    		'openings' => $openings,
		    'days' => $days,
		    'user_profile' => UserProfileInfo::userProfile(),
		    'user_favs' => UserProfileInfo::userFavs(),
	    ]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function blog()
	{
		$blogs = Blog::latest()->paginate(9);

		return view('index.pages.blog', [
			'blogs' => $blogs,
			'user_favs' => UserProfileInfo::userFavs(),
			'user_profile' => UserProfileInfo::userProfile(),
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showblog($slug)
	{
		$news= Blog::where('slug', '=', $slug)->first();

		return view('index.pages.blog_view', compact('news'));
	}

	/**
	 * Display my favourites openings
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
    public function myfavourites()
    {
    	if(Auth::user()) {
		    $myfavs = UserFavs::leftJoin('openings', 'openings.id', '=', 'userfavs.opening_id')
		                      ->where('userfavs.user_id', '=', Auth::id())
		                      ->get();

    		return view('index.pages.myfav', [
    			'myfavs' => $myfavs,
			    'user_profile' => UserProfileInfo::userProfile(),
			    'user_favs' => UserProfileInfo::userFavs(),
		    ]);
	    } else {
    		return redirect('/');
	    }
    }

	/**
	 * Sending message for admin
	 * @param Request $request
	 * @property $message
	 * @property $name
	 * @property $email
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function sendMessage(Request $request)
    {
    	if(Auth::check()) {
		    $name = Auth::user()->name;
		    $email = Auth::user()->email;
	    } else {
    		$name = $request->name;
    		$email = $request->email;
	    }

	    $send = new Messages();
	    $send->name = $name;
	    $send->email = $email;
	    $send->message = $request->message;
	    $send->save();

	    return redirect('/')->with('message', 'Your message successfully send!');
    }
}
