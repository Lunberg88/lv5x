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

        return view('admin.dashboard', [
            'c' => $c,
            'tg' => $tg,
	        'days' => $days,
	        'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c = new Candidate();
        return view('admin.create', [
            'c' => $c,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = new Candidate();
        if($request->user()->can('create', $candidate)){
            $candidate->fio = $request->fio;
            $candidate->email = $request->email;
            $candidate->stack = $request->stack;
            $candidate->tags = $request->tags;
            $candidate->salary = $request->salary;
            $candidate->user_id = Auth::id();
            $candidate->save();

            //Event::fire(new onAddCandidateEvent(Auth::user(), $candidate));
            Event::fire('onAddCandidate', [Auth::user(), $candidate]);

            return redirect('admin')->with('message', 'Your post successfully added!');
        } else {
            return redirect('admin')->with('error', 'Access dined for you!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($c = Candidate::find($id)) {
        $t = explode(',', $c->tags);
        //Find Candidate Profile
        $pr = Profile::where('candidate_id', $id)->first();
        
        return view('admin.show', ['c' => $c, 't' => $t, 'pr' => $pr]);

        } else {
            return redirect('admin')->with('error', 'Profile with this ID: '.$id.' not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($c = Candidate::find($id)) {

            return view('admin.edit', [
                'c' => $c,
            ]);
        } else {
            return redirect('admin')->with('error', 'Profile with this ID: '.$id.' not exists!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($c = Candidate::find($id)) {

            if ($request->user()->can('update', $c)) {

                $data = $request->except('_token');

                $c->fio = $data['fio'];
                $c->email = $data['email'];
                $c->stack = $data['stack'];
                $c->tags = $data['tags'];
                $c->salary = $data['salary'];
                $c->user_id = Auth::id();

                $c->save();

                return redirect('admin')->with('message', 'Profile successfully updated!');
            }

        return redirect('admin')->with('error', 'Access dinied, you don\'t have such permission!');
        } else {
            return redirect('admin')->with('error', 'Profile with this ID: '.$id.' not exists!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($c = Candidate::find($id)) {
        $c->delete();

        return redirect('admin')->with('message', 'The Candidate was deleted from DataBase.');
        } else {
            return redirect('admin')->with('error', 'This ID: '.$id.' not exists!');
        }
    }

    public function search(Request $request)
    {
        $stext = $request->only('search');

        foreach($stext as $key => $value) {
             
            $c = Candidate::where('stack', 'LIKE', '%'.$value.'%')->orWhere('tags', 'LIKE', '%'.$value.'%')->orWhere('salary', 'LIKE', '%'.$value.'%')->get();

        }

        return view('admin.results', ['c' => $c]);
        
    }

    public function profile($name)
    {
    	$name = trim(htmlspecialchars($name));
    	if($c = User::where('name', '=', $name)->get()) {
    		return view('admin.profile', ['c' => $c]);
	    } else {
    		return redirect('admin')->with('error', 'Profile not found!');
	    }
    }

    public function openings()
    {
	    $days = Hollidays::checkdate(date('d.m'));
    	$openings = Openings::get();

    	return view('admin.openings', [
    		'openings' => $openings,
		    'days' => $days,
	    ]);
    }
}
