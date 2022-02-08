<?php

namespace Livo\SMSPayvand\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendedSms
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $destination_address;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($destination_address, $message)
    {
        $this->destination_address = $destination_address;
        $this->message = $message;
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
