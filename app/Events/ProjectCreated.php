<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProjectCreated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $project;
    public function __construct($project)
    {
        $this->project = $project;
    }

public function broadcastOn()
    {
        return new PrivateChannel('broad');
    }

}
