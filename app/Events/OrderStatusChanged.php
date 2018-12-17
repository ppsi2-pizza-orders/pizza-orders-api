<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Order;
use App\Http\Resources\Order\OrderResource;

class OrderStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $status;
    protected $channelToken;

    public function __construct(Order $order)
    {
        $this->status = $order->status;
        $this->channelToken = $order->token;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('order.'.$this->channelToken);
    }
}
