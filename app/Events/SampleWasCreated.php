<?php

namespace FisiLabs\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use FisiLabs\Experiment;

class SampleWasCreated
{
    use InteractsWithSockets, SerializesModels;

    public $experiment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Experiment $experiment)
    {
        $this->experiment = $experiment;
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
