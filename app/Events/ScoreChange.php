<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Score;
use App\User;
use App\Challenge;

class ScoreChange
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $score, $user, $challenge;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Score $score, User $user, Challenge $challenge)
    {
        $this->score = $score;
        $this->user = $user;
        $this->challenge = $challenge;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
