<?php

namespace App\Http\Controllers\API;

use Auth;
use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiHistoryController extends Controller
{
	public function showAllHistory()
	{
		if(Auth::user() && Auth::user()->admin == 1) {
			return ($history = History::orderBy('id', 'desc')->get()) ?
				response()->json($history, 200) :
				response()->json(['message' => 'Empty...'], 200);
		}
		return  response()->json(['message' => 'Unauthorized...'], 401);
	}
}
