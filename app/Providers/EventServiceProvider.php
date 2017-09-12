<?php

namespace App\Providers;

use Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\onAddCandidateEvent' => [
            'App\Listeners\AddCandidateListener',
        ],
    ];

    /**
     * Register any other events for your application.
     */
    public function boot()
    {
        parent::boot();
        Event::listen('onAddCandidate', function($user, $candidate) {
            Log::info('New Candidate - ', [$user->name => $candidate->id]);
        });
    }
}
