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
        if(Auth::check() && Auth::user()->admin == '1') {
            $openingsList = Openings::orderBy('id', 'desc')->paginate(9);
            return !$openingsList->isEmpty() ?
                response()->json($openingsList, 200) :
                response()->json(['message' => 'Error while fetching.'], 200);
        }
    	return response()->json(['message' => 'Unauthorized!'], 401);
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function viewOpeningsDetail($id)
    {
        if(Auth::check() && Auth::user()->admin == '1') {
            return ($openingsDetail = Openings::find($id)) ?
                response()->json(['data' => $openingsDetail], 200) :
                response()->json(['message' => 'Error, opening not found.'], 200);
        }
        return response()->json(['message' => 'Unauthorized!'], 401);
    }
}
