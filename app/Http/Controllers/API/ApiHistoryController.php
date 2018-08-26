<?php

namespace App\Http\Controllers\API;

use Auth;
use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiHistoryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
	public function showAllHistory()
	{
		if(Auth::user() && Auth::user()->admin == 1) {
			return ($history = History::orderBy('id', 'desc')->paginate(15)) ?
				response()->json($history, 200) :
				response()->json(['message' => 'Empty...'], 200);
		}
		return  response()->json(['message' => 'Unauthorized...'], 401);
	}

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
	public function showHistory()
    {
        return History::paginate(5);
    }
}
