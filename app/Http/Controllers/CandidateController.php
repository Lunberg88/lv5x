<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Profile;
use Auth;
use Gate;
use Event;
use Illuminate\Support\Facades\Storage;
use App\Events\onAddCandidateEvent;
use App\Listeners\AddCandidateListener;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
	/**
	 * Statuses:
	 * 0 - inactive
	 * 1 - pending
	 * 2 - viewed
	 * 3 - skype interview
	 * 4 - client review
	 * 5 - hired
	 */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::latest()->get();
	    $tags = [
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

        return view('admin.dashboard', [
        	'candidates' => $candidates,
	        'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidate = new Candidate();

        return view('admin.candidates.create', [
        	'candidate' => $candidate,
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
		    $candidate->currency = $request->currency;
		    $candidate->cvs = $request->cvs ? $request->cvs : 'http://';
		    $fileName = str_replace('.', '-', str_replace('@', '_', $request->email));
		    if($request->hasFile('upload_cvs') && $request->file('upload_cvs') !== null) {
			    $candidate->upload_cvs = $request->file('upload_cvs')->storeAs('doc', 'candidate-'.$fileName.'.'.$request->file('upload_cvs')->getClientOriginalExtension());
		    }
		    $candidate->status = '2';
		    $candidate->viewed = '1';
		    $candidate->user_id = Auth::id();
		    $candidate->save();

		    //Event::fire(new onAddCandidateEvent(Auth::user(), $candidate));
		    Event::fire('onAddCandidate', [Auth::user(), $candidate]);

		    return redirect('admin/candidates')->with(['message' => 'New candidate successfully added!', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'Access dined for you!', 'alert-type' => 'danger']);
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
	    if($candidate = Candidate::find($id)) {
	    	if($candidate->viewed != 1) {
			    $candidate->viewed = 1;
			    $candidate->save();
		    }

		    $tags = explode(',', $candidate->tags);

		    return view('admin.candidates.show', ['candidate' => $candidate, 'tags' => $tags]);

	    } else {
		    return redirect('admin/candidates')->with(['message' => 'Profile with this ID: '.$id.' not found.', 'alert-type' => 'danger']);
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
	    if($candidate = Candidate::find($id)) {

		    return view('admin.candidates.edit', [
			    'candidate' => $candidate,
		    ]);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'Profile with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
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
	    if($candidate = Candidate::find($id)) {

		    if ($request->user()->can('update', $candidate)) {

			    $data = $request->except('_token');

			    if($request->delete_cvs == "true") {
				    Storage::delete($candidate->upload_cvs);
				    $candidate->upload_cvs = null;
				    $candidate->save();

				    return redirect('admin/candidates/edit/'.$id)->with(['message' => 'Candidate CV successfully deleted!']);
			    }

			    $candidate->fio = $data['fio'];
			    $candidate->email = $data['email'];
			    $candidate->stack = $data['stack'];
			    $candidate->tags = $data['tags'];
			    $candidate->salary = $data['salary'];
			    $candidate->currency = $data['currency'];
			    $candidate->user_id = Auth::id();
			    if($candidate->viewed != '1') {
			    	$candidate->viewed = 1;
			    }
			    $fileName = str_replace('.', '-', str_replace('@', '_', $candidate->email));
			    if($request->hasFile('edit_upload_cvs') && $request->file('edit_upload_cvs') != '') {
			    	$old_cvs = $candidate->upload_cvs;
			    	if($new_cvs = $request->file('edit_upload_cvs')->storeAs('doc', 'candidate-'.$fileName.'.'.$request->file('edit_upload_cvs')->getClientOriginalExtension())) {
			    		$candidate->upload_cvs = $new_cvs;
			    		Storage::delete($old_cvs);
				    }
			    }

			    $candidate->save();

			    return redirect('admin/candidates')->with(['message' => 'Profile successfully updated!', 'alert-type' => 'info']);
		    }

		    return redirect('admin/candidates')->with(['message' => 'Access denied, you don\'t have such permission!', 'alert-type' => 'danger']);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'Profile with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
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
	    if($candidate = Candidate::find($id)) {
	    	Storage::detele($candidate->upload_cvs);
		    $candidate->delete();

		    return redirect('admin/candidates')->with(['message' => 'The Candidate was deleted from DataBase.', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'This ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function search(Request $request, $stext = null)
	{
		$stext = $request->only('search', 'stags');

		if($stext == null) {
			return view('admin.search-empty');
		} else {
			foreach($stext as $key => $value) {

				$candidate = Candidate::where('stack', 'LIKE', '%'.$value.'%')->orWhere('tags', 'LIKE', '%'.$value.'%')->orWhere('salary', 'LIKE', '%'.$value.'%')->get();

			}

			return view('admin.candidates.search_result', [
				'candidate' => $candidate,
			]);
		}
	}
}
