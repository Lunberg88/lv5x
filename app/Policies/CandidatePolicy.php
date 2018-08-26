<?php

namespace App\Policies;

use App\User;
use App\Candidate;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatePolicy
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

    public function create(User $user)
    {
        foreach($user->roles as $role){
            if($role->rolename == "GlobalAdmin") {
                return true;
            }
        }
        return false;
    }

    public function update(User $user, Candidate $candidate)
    {
        foreach($user->roles as $role){
            if($role->rolename == "GlobalAdmin") {
                if ($user->id == $candidate->user_id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function before(User $user)
    {
        foreach($user->roles as $role){
            if($role->rolename == "GlobalAdmin") {
                return true;
            }
        }
        return false;
    }
}
