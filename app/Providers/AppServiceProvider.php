<?php

namespace App\Providers;

use Log;
use Auth;
use App\History;
use App\Candidate;
use App\Openings;
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
	        $addToHistory = new History();
	        $addToHistory->name = 'Added new candidate';
	        $addToHistory->actions = 'Candidate <a href=/admin/candidates/candidate-'.$candidate->id.'\>id: '.$candidate->id.'</a> created';
	        $addToHistory->type = 1;
	        $addToHistory->save();

        });
        Candidate::updated(function(Candidate $candidate) {
        	$addToHistory = new History();
        	$addToHistory->name = 'Editing candidate info';
        	$addToHistory->actions = 'Editing candidate - #'.$candidate->id.' by user: '.Auth::user()->name.'. The candidate fio is: <a href=/admin/candidates/candidate-'.$candidate->id.'>'.$candidate->fio.'</a> his id is: '.$candidate->id;
	        $addToHistory->type = 2;
        	$addToHistory->save();
        });

        Candidate::deleted(function(Candidate $candidate) {
        	$addToHistory = new History();
        	$addToHistory->name = 'The candidate deleted';
        	$addToHistory->actions = 'The candidate with id #'.$candidate->id.' was deleted by: '.Auth::user()->name;
	        $addToHistory->type = 3;
        	$addToHistory->save();
        });

        //Openings history mode

	    Openings::created(function(Openings $openings) {
	    	$addToHistory = new History();
	    	$addToHistory->name = 'Created new Opening';
	    	$addToHistory->actions = 'Opening - '.$openings->title.' was created by: '.Auth::user()->name;
		    $addToHistory->type = 1;
	    	$addToHistory->save();
	    });
	    Openings::updated(function(Openings $openings) {
	    	$addToHistory = new History();
	    	$addToHistory->name = 'Updating Opening';
	    	$addToHistory->actions = 'Opening <b>'.$openings->title.'</b> was updated by: '.Auth::user()->name;
		    $addToHistory->type = 2;
	    	$addToHistory->save();
	    });
	    Openings::deleted(function(Openings $openings) {
		    $addToHistory = new History();
		    $addToHistory->name = 'The opening deleted';
		    $addToHistory->actions = 'The Opening with id <b>'.$openings->title.'</b> was deleted by: '.Auth::user()->name;
		    $addToHistory->type = 3;
		    $addToHistory->save();
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
