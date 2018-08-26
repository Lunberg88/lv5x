<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CandidateController extends BaseController
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
        return view('admin.dashboard', [
        	'candidates' => $this->candidate->getLatestByLimit(15),
	        'tags' => $this->coreSettings->getCoreSettingsMainStacks(),
            'newCandidates' => $this->candidateHelperService->showNewNotif('candidates'),
            'candidateHelper' => $this->candidateHelperService
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidates.create', [
            'candidate' => $this->candidate,
            'stacks' => $this->coreSettings->getCoreSettingsMainStacks(),
            'currency' => $this->candidateHelperService->getCurrency()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CandidateRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $candidateRequest)
    {
        if($candidateRequest->user()->can('create', $this->candidate)) {
            if($this->candidateService->createNewCandidate($candidateRequest)) {
                return redirect('admin/candidates')->with(['message' => 'New candidate successfully added!', 'alert-type' => 'success']);
            }
        }
        return redirect('admin/candidates')->with(['message' => 'Access dined for you!', 'alert-type' => 'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    if($candidate = $this->candidate::find($id)) {
	    	$candidate->viewed != 1 ? $candidate->update(['viewed' => 1]) : false;
		    return view('admin.candidates.show', [
		        'candidate' => $candidate,
                'tags' => explode(',', $candidate->tags),
                'service' => $this->candidateHelperService]);
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
	    if($candidate = $this->candidate::find($id)) {
		    return view('admin.candidates.edit', [
			    'candidate' => $candidate,
                'stacks' => $this->coreSettings->getCoreSettingsMainStacks(),
                'currency' => $this->candidateHelperService->getCurrency()
		    ]);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'Profile with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * @param CandidateRequest $candidateRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CandidateRequest $candidateRequest, $id)
    {
	    if($candidate = $this->candidate::find((int)$id)) {
		    if ($candidateRequest->user()->can('update', $candidate)) {
		        if($candidateRequest->delete_cvs == 'true') {
		            $this->candidateService->removeAttachedCvs($candidateRequest, (int)$id);
                    return redirect('admin/candidates/edit/'.$candidate->id)->with(['message' => 'Candidate CV successfully deleted!']);
                }
		        if($this->candidateService->updateCandidateInfo($candidateRequest, (int)$id)) {
                    return redirect('admin/candidates')->with(['message' => 'Profile successfully updated!', 'alert-type' => 'info']);
                }
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
	    if($candidate = $this->candidate::find($id)) {
	    	Storage::delete($candidate->upload_cvs);
		    $candidate->delete();
		    return redirect('admin/candidates')->with(['message' => 'The Candidate was deleted from DataBase.', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/candidates')->with(['message' => 'This ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

	/**
	 * @param Request $request
	 * @param $stext
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function search(Request $request, $stext = null)
	{
		$stext = $request->only('search', 'stags');

		if($stext == null) {
			return view('admin.search-empty');
		} else {
			foreach($stext as $key => $value) {
				$candidate = $this->candidate->searchCandidateByDetails($value);
			}
			return view('admin.candidates.search_result', [
				'candidate' => $candidate,
                'candidateHelper' => $this->candidateHelperService
			]);
		}
	}
}
