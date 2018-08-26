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
