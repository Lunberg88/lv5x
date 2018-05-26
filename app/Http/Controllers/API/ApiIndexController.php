<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Candidate;
use App\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiIndexController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showNotifications()
    {
        if(Auth::check() && Auth::user()->admin == '1') {
            $newCandidates = Candidate::where('viewed', '=', '0')->get();
            $newMessages = Messages::where('viewed', '=', '0')->get();

            return response()->json([
                'newCandidates' => !$newCandidates->isEmpty() ? count($newCandidates) : null,
                'newMessages' => !$newMessages->isEmpty() ? count($newMessages) : null
            ], 200);
        }

        return response()->json(['message' => 'Error, Unauthorized - 401']);
    }
}
