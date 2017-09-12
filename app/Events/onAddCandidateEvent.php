<?php

namespace App\Events;

use App\Candidate;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class onAddCandidateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $candidate;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Candidate $candidate)
    {
        $this->username = $user->name;
        $this->candidate = $candidate->fio;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
