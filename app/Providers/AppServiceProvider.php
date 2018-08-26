<?php

namespace App\Providers;

use App\Observers\CandidateObserver;
use App\Observers\OpeningObserver;
use Auth;
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

        //Models Observer
        Candidate::observe(CandidateObserver::class);
        Openings::observe(OpeningObserver::class);

	    //View composer
        view()->composer('frontend.*', 'App\Http\Composers\FrontendComposer');
        view()->composer('admin.index', 'App\Http\Composers\MasterComposer');
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
