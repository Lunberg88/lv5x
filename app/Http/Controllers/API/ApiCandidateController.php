<?php

namespace App\Http\Controllers\API;

use App\Candidate;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCandidateController extends Controller
{
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function showAllCandidatesList()
	{
	    if(Auth::check() && Auth::user()->admin == 1) {
            $candidateList = Candidate::orderBy('id', 'desc')->get();
            return !$candidateList->isEmpty() ?
                response()->json($candidateList, 200) :
                response()->json(['message' => 'Error occurred...'], 200);
        } else {
	        return response()->json(['message' => 'Error, not Authorized'], 401);
        }
	}
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function createNewCandidate(Request $request)
    {
    	if(Auth::check() && Auth::user()->admin == 1) {
    		$candidate = new Candidate();
    		$candidate->create($request->all());
    		$testCVS = $candidate->upload_cvs;
    		return response()->json(['message' => 'Candidate successfully added!'], 200);
	    } else {
    		return response()->json(['message' => 'Error, 401 Unauthorized - backend response'], 200);
	    }
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function viewCandidateProfile($id)
    {
    	if($candidateProfile = Candidate::find($id)) {
    		$candidateProfile->viewed = 1;
    		$candidateProfile->save();
    		return response()->json(['data' => $candidateProfile], 200);
	    }
	        return response()->json(['message' => 'Candidate profile not found'], 404);
    }

	/**
	 * @param Request $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function updateCandidateProfile(Request $request, $id)
    {
    	if($candidate = Candidate::find($id)) {
    		$candidate->update($request->all());
    		return response()->json(['message' => 'Candidate profile successfully updated!'], 200);
	    }
	    return response()->json(['message' => 'An error occurred.'], 404);
    }

	/**
	 * @param $id
	 *
	 * @return bool|\Illuminate\Http\JsonResponse|null
	 */
    public function removeCandidate($id)
    {
    	if(Auth::check() && Auth::user()->admin === 1) {
		    return ($removeCandidate = Candidate::find($id)) ?
			    $removeCandidate->delete() :
			    response()->json(['message' => 'Profile not found'], 200);
	    }
	    return response()->json(['message' => 'Error, Unauthorized...'], 401);
    }
}
