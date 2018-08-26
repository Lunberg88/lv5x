<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\SendMessageRequest;
use Auth;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
	 * Display homepage
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
		    return view('frontend.main', ['openings' => $this->opening->getLatestOpeningsByLimit(3)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutPage()
    {
        return view('frontend.pages.about');
    }

	/**
	 * Display openings for auth, guests
     * @param $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function openings(Request $request)
    {
    	$openings = $this->opening->getOpeningsByLimit(9);
	    if($request->has('type') && $request->type != '') {
	    	$openings = $this->opening->sortByTypeWithLimit($request->type, 9, 'type');
	    }
	    if($request->has('status') && $request->status != '') {
	    	$openings = $this->opening->sortByTypeWithLimit($request->status, 9, 'status');
	    }

    	return view('frontend.pages.openings', ['openings' => $openings]);
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function sortOpening(Request $request)
    {
    	if($request->has('type') && $request->type != '') {
    		$openings = $this->opening->sortByType($request->type);
    		return response()->json($openings, 200);
	    } else {
    		return response()->json(['status' => 'Error'], 200);
	    }
    }

	/**
	 * @param $slug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
	 */
    public function showOpening($slug)
    {
    	if(!$opening = $this->opening->getBySlug($slug)) {
		    return redirect('/openings')->with(['message' => 'Opening not found :/', 'alert-type' => 'danger']);
	    } else {
		    return view('frontend.pages.opening', [
		        'opening' => $opening,
                'applied' => $this->candidateToOpening->getUserOpening(Auth::id(), $opening->id)
            ]);
	    }
    }

    /**
     * @param SendMessageRequest $sendMessageRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(SendMessageRequest $sendMessageRequest)
    {
        if($sendMessageRequest->validated()) {
            if(Auth::check()) {
                $sendMessageRequest->name = $this->user->name;
                $sendMessageRequest->email = $this->user->email;
            }

            if($this->message->create($sendMessageRequest->except('_token'))) {
                return redirect('/')->with(['message' => 'Your message successfully send!', 'alert-type' => 'success']);
            }
        }
        return back()->with(['message' => 'All fields required!', 'alert-type' => 'danger']);
    }

    /**
     * Show user profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userProfile()
    {
        return view('frontend.user.profile', [
            'user' => $this->user->find(Auth::id()),
            'subscribe' => $this->candidate->getUserSubscribe(Auth::user()->email)
        ]);
    }

    /**
     * @param UserProfileRequest $userProfileRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserProfile(UserProfileRequest $userProfileRequest)
    {
        if($this->profileService->updateUserProfile($userProfileRequest, Auth::id())) {
            return back()->with(['message' => 'Your profile updated!', 'alert-type' => 'info']);
        }
        return back()->with(['message' => 'Check profile fields!', 'alert-type' => 'danger']);
    }

}
