<?php

namespace App\Http\Controllers;

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
    	$days = Hollidays::checkdate($cur_day);

    	//echo "<pre>".print_r($days,1)."</pre>"; die();

    	return view('index.pages.main', [
		    'days' => $days,
	    ]);
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

    public function test()
    {
	    $days = Hollidays::checkdate(date('d.m'));

    	return view('index.pages.testing', [
    		'days' => $days,
	    ]);
    }
}
