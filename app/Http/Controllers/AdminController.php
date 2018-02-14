<?php

namespace App\Http\Controllers;

use App\CoreSettings;
use App\History;
use App\Openings;
use Gate;
use App\Traits\Hollidays;
use Auth;
use Event;
use App\User;
use App\Candidate;
use App\Profile;
use App\Messages;
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
        $newCandidates = Candidate::where('viewed', '=', '0')->get();

        return view('admin.index', [
            'c' => $c,
            'tg' => $tg,
	        'days' => $days,
	        'user' => $user,
	        'newCandidates' => $newCandidates,
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

    public function history()
    {
    	$history = History::orderBy('id', 'DESC')->paginate(20);

    	return view('admin.history.history', compact('history'));
    }

    public function msg()
    {
    	$messages = Messages::paginate(20);

    	return view('admin.messages', compact('messages'));
    }

    public function settings()
    {
    	$settings = CoreSettings::get();

    	return view('admin.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $newrequest = $this->validate($request->only('name', 'val'));
    	$settings = CoreSettings::find(1);
    	if(!$settings->isEmpty()) {
    		$settings->name = $newrequest->newValName;
    		$settings->value = $newrequest->newValVal;
    		$settings->save();
	    }

	    return redirect('/admin/settings')->with('message', 'Settings updated!');
    }
}
