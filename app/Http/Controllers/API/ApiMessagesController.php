<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiMessagesController extends Controller
{
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function showAllMessages()
    {
    	if(Auth::user() && Auth::user()->admin == 1) {
    		return ($messages = Messages::orderBy('id', 'desc')->get()) ?
			    response()->json($messages, 200) :
			    response()->json(['message' => 'Empty...'], 200);
	    }
	    return  response()->json(['message' => 'Unauthorized...'], 401);
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
	 */
    public function readInboxMessage($id)
    {
    	$readMsg = Messages::find($id);
    	return $readMsg ?
		    response()->json($readMsg, 200) :
		    response(['message' => 'Error, message not found'], 404);
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function deleteMessage($id)
    {
    	if(Auth::user() && Auth::user()->admin == 1) {
		    return ($deleted = Messages::delete($id)) ?
			    response()->json(['message' => 'Successfully deleted!'], 200) :
			    response()->json(['message' => 'Error, message not found'], 403);
	    }
	    return response()->json(['message' => 'Error. Unauthorized or not enough permissions'], 401);
    }
}
