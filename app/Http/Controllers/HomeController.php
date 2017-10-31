<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Role;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$u = Auth::user();
    	$t = Auth::id();
        return view('home', [
        	'u' => $u,
	        't' => $t,
        ]);
    }
}
