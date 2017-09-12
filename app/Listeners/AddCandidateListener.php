<?php

namespace App\Listeners;

use Log;
use App\Events\onAddCandidateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddCandidateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onAddCandidateEvent  $event
     * @return void
     */
    public function handle(onAddCandidateEvent $event)
    {
        $event->username;
        $event->candidate;
        Log::info('Added new candidate: ', [$event->username => $event->candidate]);
    }
}
