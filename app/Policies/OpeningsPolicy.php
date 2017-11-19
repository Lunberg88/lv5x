<?php

namespace App\Policies;

use App\User;
use App\Openings;
use Illuminate\Auth\Access\HandlesAuthorization;

class OpeningsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	/**
	 * @param User $user
	 *
	 * @return bool
	 */
	public function createO(User $user)
	{
		foreach($user->roles as $role){
			if($role->id === 5) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param User $user
	 * @param Openings $openings
	 *
	 * @return bool
	 */
	public function updateO(User $user, Openings $openings)
	{
		foreach($user->roles as $role){
			if($role->id === 5) {
				if ($user->id == $openings->user_id) {
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * @param User $user
	 *
	 * @return bool
	 */
	public function before(User $user)
	{
		foreach($user->roles as $role){
			if($role->id === 5) {
				return true;
			}
		}
		return false;
	}
}
