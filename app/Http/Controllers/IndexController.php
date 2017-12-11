<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Openings;
use App\User;
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

    	if(Auth::check()) {
    		$user_profile = Candidate::where('email', '=', Auth::user()->email)->get();

		    return view('index.pages.main', [
			    'openings' => $openings,
			    'user_profile' => $user_profile,
		    ]);
	    } else {
    		return view('index.pages.main', [
    			'openings' => $openings,
		    ]);
	    }
    }

    public function openings()
    {
    	$openings = Openings::where('status', '=', '1')->get();
	    $days = Hollidays::checkdate(date('d.m'));

    	return view('index.pages.openings', [
    		'openings' => $openings,
		    'days' => $days,
	    ]);
    }
}
