<?php

namespace App\Http\Controllers;

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
    	$user = User::find(Auth::id());
    	$days = Hollidays::checkdate($cur_day);

    	//echo "<pre>".print_r($days,1)."</pre>"; die();

    	return view('index', [
    		'user' => $user,
		    'days' => $days,
	    ]);
    }
}
