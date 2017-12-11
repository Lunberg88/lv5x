<?php

namespace App\Providers;

use Log;
use App\Candidate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Candidate::created(function(Candidate $candidate) {
        	Log::info('Created new candidate: ', [
        		'#id' => $candidate->id,
        		'Fio:' => $candidate->fio,
		        'Stack' => $candidate->stack,
		        'Salary' => $candidate->salary,
		        'cvs' => $candidate->cvs,
		        'Created at:' => $candidate->created_at,
		        'Added by:' => $candidate->user_id,
	        ]);
        });

        Candidate::updated(function(Candidate $candidate) {
           Log::info('Updated candidate-info: ', [$candidate->user->name => $candidate->fio]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
