<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Openings;
use App\User;
use App\UserFavs;
use Auth;
use App\Traits\Hollidays;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	use Hollidays;

    public function index()
    {
    	$cur_day = date('d.m');
    	//$days = Hollidays::checkdate($cur_day);
    	$openings = Openings::latest()->take(3)->get();
    	$user_favs = UserFavs::leftJoin('openings', 'openings.id', '=', 'userfavs.opening_id')->where('userfavs.user_id', '=', Auth::id())->get();
		//$user_favs = UserFavs::where('user_id', '=', Auth::id())->get();

    	if(Auth::check()) {
    		$user_profile = Candidate::where('email', '=', Auth::user()->email)->get();

		    return view('index.pages.main', [
			    'openings' => $openings,
			    'user_profile' => $user_profile,
			    'user_favs' => $user_favs
		    ]);
	    } else {
    		return view('index.pages.main', [
    			'openings' => $openings,
			    'user_favs' => $user_favs
		    ]);
	    }
    }

    public function openings()
    {
    	$openings = Openings::where('status', '=', '1')->paginate(9);
	    $days = Hollidays::checkdate(date('d.m'));

    	return view('index.pages.openings', [
    		'openings' => $openings,
		    'days' => $days,
	    ]);
    }

    public function myfavourites()
    {
    	if(Auth::user()) {
		    $myfavs = UserFavs::leftJoin('openings', 'openings.id', '=', 'userfavs.opening_id')
		                      ->where('userfavs.user_id', '=', Auth::id())
		                      ->get();

    		return view('index.pages.myfav', compact('myfavs'));
	    } else {
    		return redirect('/');
	    }
    }
}
