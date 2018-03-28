<?php

namespace App\Providers;

use App\Openings;
use App\Policies\CandidatePolicy;
use App\Policies\OpeningsPolicy;
use App\User;
use App\Candidate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        Candidate::class => CandidatePolicy::class,
	    Openings::class => OpeningsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);
        /*
                $gate->define('can-create', function(User $user){
                    foreach($user->roles as $role){
                        if($role->name == "GlobalAdmin") {
                            return true;
                        }
                    }
                    return false;
                });

                $gate->define('can-update', function(User $user, $subject){
                   foreach($user->roles as $role){
                       if($role->name == "GlobalAdmin") {
                           if ($user->id == $subject->user_id) {
                               return true;
                           }
                       }
                   }
                   return false;
                });
                */
        Passport::routes();
    }
}
