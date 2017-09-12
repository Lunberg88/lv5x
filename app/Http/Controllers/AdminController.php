<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use Gate;
use Auth;
use Event;
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
        $c = Candidate::get();

        return view('admin.index', [
            'c' => $c,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = Candidate::findOrFail($id);

        return view('admin.edit', [
            'c' => $c,
        ]);
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
        $c = Candidate::findOrFail($id);

        if ($request->user()->can('update', $c)) {

            $data = $request->except('_token');

            $c->fio = $data['fio'];
            $c->email = $data['email'];
            $c->stack = $data['stack'];
            $c->tags = $data['tags'];
            $c->salary = $data['salary'];
            $c->user_id = Auth::id();

            $c->save();

            return redirect()->route('admin.index');
        }

        return redirect('admin')->with('error', 'Access dinied, you don\'t have such permission!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
