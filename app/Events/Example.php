<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class Example implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public string $queue = 'chat';
    // public function broadcastQueue() : string
    // {
    //     return 'chat'; 
    // }


    /**
     * Create a new event instance.
     */
    public function __construct(public User $user, protected Message $message)
    {
        //
    }


    public function broadcastWith(): array
    {
        return [
            'user' => [
                'id' => $this->user->id,
                'user' => $this->user->name,
            ],

            'message' => [
                'id' => $this->message->id,
            ],
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat'),
        ];
    }
}
