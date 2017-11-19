<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Event;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use App\Openings;
use Illuminate\Http\Request;

class OpeningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$openings = Openings::get();

		return view('admin.openings', [
			'openings' => $openings,
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $openings = new Openings();

	    return view('admin.openings.create', [
		    'openings' => $openings,
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
	    $openings = new Openings();
	    if($request->user()->can('createO', $openings)){
		    $openings->title = $request->title;
		    $openings->location = $request->location;
		    $openings->salary = $request->salary;
		    $openings->description = $request->description;
		    $openings->status = $request->status;
		    $openings->user_id = Auth::id();
		    $openings->save();

		    //Event::fire(new onAddCandidateEvent(Auth::user(), $candidate));
		    Event::fire('onAddCandidate', [Auth::user(), $openings]);

		    return redirect('admin/openings')->with('message', 'New candidate successfully added!');
	    } else {
		    return redirect('admin/openings')->with('error', 'Access dined for you!');
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
	    if($openings = Openings::find($id)) {

		    return view('admin.openings.show', ['openings' => $openings,]);

	    } else {
		    return redirect('admin/openings')->with('error', 'Opening with this ID: '.$id.' not found.');
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
	    if($openings = Openings::find($id)) {

		    return view('admin.openings.edit', [
			    'openings' => $openings,
		    ]);
	    } else {
		    return redirect('admin/openings')->with('error', 'Opening with this ID: '.$id.' not exists!');
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
	    if($openings = Openings::find($id)) {

		    if ($request->user()->can('updateO', $openings)) {

			    $data = $request->except('_token');

			    $openings->title = $data['title'];
			    $openings->location = $data['location'];
			    $openings->salary = $data['salary'];
			    $openings->description = $data['description'];
			    $openings->status = $data['status'];
			    $openings->user_id = Auth::id();

			    $openings->save();

			    return redirect('admin/openings')->with('message', 'Opening successfully updated!');
		    }

		    return redirect('admin/openings')->with('error', 'Access denied, you don\'t have such permission!');
	    } else {
		    return redirect('admin/openings')->with('error', 'Opening with this ID: '.$id.' not exists!');
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
	    if($openings = Openings::find($id)) {
		    $openings->delete();

		    return redirect('admin/openings')->with('message', 'The Opening was deleted from DataBase.');
	    } else {
		    return redirect('admin/openings')->with('error', 'This ID: '.$id.' not exists!');
	    }
    }

	/**
	 * @param $stext
	 * @return \Illuminate\Http\Response
	 */
    public function search(Request $request, $stext = null)
    {
	    $stext = $request->only('search');

	    if($stext == null) {
		    return view('admin.search-empty');
	    } else {
		    foreach($stext as $key => $value) {

			    $openings = Openings::where('title', 'LIKE', '%'.$value.'%')->orWhere('location', 'LIKE', '%'.$value.'%')->orWhere('salary', 'LIKE', '%'.$value.'%')->orWhere('status', 'LIKE', '%'.$value.'%')->get();

		    }

		    return view('admin.openings.search_result', [
			    'openings' => $openings,
		    ]);
	    }
    }
}
