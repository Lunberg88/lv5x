<?php

namespace App\Traits;

use Auth;
use App\UserFavs;
use App\Candidate;

trait UserProfileInfo
{
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|null|static[]
	 */
	public static function userFavs()
	{
		if(Auth::check()) {
			$user_favs = UserFavs::leftJoin('openings', 'openings.id', '=', 'userfavs.opening_id')
			                     ->where('userfavs.user_id', '=', Auth::id())
			                     ->get();
			return $user_favs;
		} else {
			return null;
		}
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|null|static[]
	 */
	public static function userProfile()
	{
		if(Auth::check()) {
			$user_profile = Candidate::where('email', '=', Auth::user()->email)
			                         ->get();
			return $user_profile;
		} else {
			return null;
		}
	}
}