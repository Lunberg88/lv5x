<?php

namespace App\Http\Controllers;

use App\Openings;
use Gate;
use App\Traits\Hollidays;
use Auth;
use Event;
use App\User;
use App\Candidate;
use App\Profile;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $days = Hollidays::checkdate(date('d.m'));
        $c = Candidate::get();

        $tg = [
            'HTML',
            'JS',
            'PHP',
            'MySQL',
            'JAVA',
            'AngularJS',
            'Angular (2.x/4.x)',
            'ReactJS',
            'VueJS',
            'iOS',
            'Android',
            'PS'
        ];

        $user = User::find(Auth::id());
        return view('admin.index', [
            'c' => $c,
            'tg' => $tg,
	        'days' => $days,
	        'user' => $user,
        ]);
    }

    public function gloablSearch(Request $request)
    {
    	$text = $request->only('keywords');

    	$stext = explode(' ', $text);

    	foreach($stext as $value) {
    		$result = Candidate::leftJoin('openings','')->get();
	    }

    }
}
