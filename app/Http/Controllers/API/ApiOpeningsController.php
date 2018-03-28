<?php

namespace App\Http\Controllers\API;

use App\Openings;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiOpeningsController extends Controller
{
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function showAllOpeningsList()
    {
    	$openingsList = Openings::orderBy('id', 'desc')->get();
    	return !$openingsList->isEmpty() ? response()->json($openingsList, 200) : response()->json(['messsage' => 'Error while fetching.'], 200);
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function viewOpeningsDetail($id)
    {
    	return ($openingsDetail = Openings::find($id)) ?
		    response()->json(['data' => $openingsDetail], 200) :
		    response()->json(['message' => 'Error, opening not found.'], 200);
    }
}
