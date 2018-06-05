<?php

namespace App\Http\Controllers;

use App\CandidateToOpening;
use Log;
use App\Candidate;
use App\CoreSettings;
use App\Messages;
use App\Openings;
use App\Traits\UserProfileInfo;
use App\User;
use App\UserFavs;
use Auth;
use App\Blog;
use App\Traits\Hollidays;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;

class IndexController extends Controller
{
	use Hollidays, UserProfileInfo;

	/**
	 * Display homepage
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
    	$openings = Openings::latest()
	                        ->take(3)
	                        ->get();

		    return view('frontend.main', [
		    	'openings' => $openings,
			    'user_favs' => UserProfileInfo::userFavs(),
			    'user_profile' => UserProfileInfo::userProfile(),
		    ]);

    }

	/**
	 * Display openings for auth, guests
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function openings(Request $request)
    {
    	$openings = Openings::orderByDesc('id')
	                        ->paginate(9);
	    $socials = new Share();
	    $social_links = $socials->page('http://www.recuiter-iia.tk', 'Opening')
	                            ->facebook('Shared Opening')
	                            ->googlePlus()
	                            ->linkedin();
	    if($request->has('type') && $request->type != '') {
	    	$openings = Openings::where('type','=', $request->type)->orderByDesc('id')->paginate(9);
	    }
	    if($request->has('status') && $request->status != '') {
	    	$openings = Openings::where('status', '=', $request->status)->orderByDesc('id')->paginate(9);
	    }

    	return view('frontend.pages.openings', [
    		'openings' => $openings,
		    'user_profile' => UserProfileInfo::userProfile(),
		    'social_links' => $social_links,
		    //'user_favs' => UserProfileInfo::userFavs(),
	    ]);
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function sortOpening(Request $request)
    {
    	if($request->has('type') && $request->type != '') {
    		$openings = Openings::where('type', '=', $request->type)->get();
    		return response()->json($openings, 200);
	    } else {
    		return response()->json(['status' => 'Error'], 200);
	    }
    }

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
	 */
    public function showOpening($slug)
    {
    	if(!$opening = Openings::where('slug', '=', $slug)->first()) {
		    return abort(404, 'Not found');
	    } else {
            $applied = CandidateToOpening::where([
                ['user_id', '=', Auth::id()],
                ['opening_id', '=', $opening->id],
            ])->get();
		    return view('frontend.pages.opening', [
		        'opening' => $opening,
                'applied' => $applied,
                'user_profile' => UserProfileInfo::userProfile(),
            ]);
	    }
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function blog()
	{
		$blogs = Blog::latest()->paginate(9);

		return view('index.pages.blog', [
			'blogs' => $blogs,
			'user_favs' => UserProfileInfo::userFavs(),
			'user_profile' => UserProfileInfo::userProfile(),
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showblog($slug)
	{
		$news= Blog::where('slug', '=', $slug)->first();

		return view('index.pages.blog_view', compact('news'));
	}

	/**
	 * Display my favourites openings
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
    public function myfavourites()
    {
    	if(Auth::user()) {
		    $myfavs = UserFavs::leftJoin('openings', 'openings.id', '=', 'userfavs.opening_id')
		                      ->where('userfavs.user_id', '=', Auth::id())
		                      ->get();

    		return view('index.pages.myfav', [
    			'myfavs' => $myfavs,
			    'user_profile' => UserProfileInfo::userProfile(),
			    'user_favs' => UserProfileInfo::userFavs(),
		    ]);
	    } else {
    		return redirect('/');
	    }
    }

	/**
	 * Sending message for admin
	 * @param Request $request
	 * @property $message
	 * @property $name
	 * @property $email
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function sendMessage(Request $request)
    {
    	if(Auth::check()) {
		    $name = Auth::user()->name;
		    $email = Auth::user()->email;
	    } else {
    		$name = $request->name;
    		$email = $request->email;
	    }

	    $send = new Messages();
	    $send->name = $name;
	    $send->email = $email;
	    $send->message = $request->message;
	    $send->save();

	    return redirect('/')->with(['message' => 'Your message successfully send!', 'alert-type' => 'success']);
    }

    /**
     * Show user profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userProfile()
    {
        if(Auth::id() == 1) {
            return redirect('/admin');
        }
        $user = User::find(Auth::id());
        $subscribe = Candidate::where('email', $user->email)->pluck('subscribe')->first();
        return view('frontend.user.profile', ['user' => $user, 'subscribe' => $subscribe]);
    }

    /**
     * Update user information
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserProfile(Request $request)
    {
        $user = User::find(Auth::id());
        $candidate = Candidate::where('email', $user->email)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        $candidate->email = $user->email;

        if($request->subscribe !== null && $request->subscribe != '') {
            $candidate->subscribe = $request->subscribe;
        }
        $candidate->save();

        if(($request->password !== null && $request->password != '') && ($request->new_password !== null && $request->new_password != '')) {
            $user->password = bcrypt(trim($request->new_password));
        }
        $user->save();

        return back()->with('message', 'Your profile updated!');
    }

}
