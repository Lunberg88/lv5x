<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpeningRequest;
use Auth;
use Gate;
use Illuminate\Http\Request;

class OpeningsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		return view('admin.openings', ['openings' => $this->opening->getLastOpenings(), 'service' => $this->candidateHelperService]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.openings.create', ['openings' => $this->opening, 'service' => $this->candidateHelperService]);
    }

    /**
     * @param OpeningRequest $openingRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OpeningRequest $openingRequest)
    {
        if($openingRequest->user()->can('createO', $this->opening)) {
            if($this->openingService->createNewOpening($openingRequest)) {
                return redirect('admin/openings')->with(['message' => 'New candidate successfully added!', 'alert-type' => 'success']);
            }
        }
        return redirect('admin/openings')->with(['error' => 'Access dined for you!', 'alert-type' => 'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    if($openings = $this->opening->find($id)) {
		    return view('admin.openings.show', ['openings' => $openings, 'service' => $this->candidateHelperService]);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not found.', 'alert-type' => 'danger']);
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
	    if($openings = $this->opening->find($id)) {
		    return view('admin.openings.edit', ['openings' => $openings]);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * @param OpeningRequest $openingRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OpeningRequest $openingRequest, $id)
    {
        if($this->opening->find((int)$id)) {
            if($openingRequest->user()->can('updateO', $this->opening->find((int)$id))) {
                if($this->openingService->updateOpening($openingRequest, $id)) {
                    return redirect('admin/openings')->with(['message' => 'Opening successfully updated!', 'alert-type' => 'info']);
                }
                return back()->with(['message' => 'Errors occurred during updating Opening!', 'alert-type' => 'danger']);
            }
            return redirect('admin/openings')->with(['message' => 'Access denied, you don\'t have such permission!', 'alert-type' => 'danger']);
        }
        return redirect('admin/openings')->with(['message' => 'Opening with this ID: '.$id.' not exists!', 'alert-type' => 'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    if($openings = $this->opening->find($id)) {
		    $openings->delete();
		    return redirect('admin/openings')->with(['message' => 'The Opening was deleted from DataBase.', 'alert-type' => 'success']);
	    } else {
		    return redirect('admin/openings')->with(['message' => 'This ID: '.$id.' not exists!', 'alert-type' => 'danger']);
	    }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function applyOpening(Request $request)
    {
        if(Auth::check()) {
           return $this->candidateToOpeningService->ApplyUserToOpening(Auth::id(), Auth::user()->name, $request);
        }
        return response()->json(['error' => 'Not Authorized'],401);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectCandidate(Request $request)
    {
        if($this->opening->getCandidatesToOpening($request->rejected_user, $request->rejected_opening)) {
            return back()->with(['message' => 'Candidate had been rejected!', 'alert-type' => 'success']);
        }
        return back()->with(['error' => 'Candidate or Opening not found.']);
    }
}
