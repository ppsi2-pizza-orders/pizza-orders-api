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

class OrderPlaced implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    protected $channelToken;

    public function __construct(Order $order)
    {
        $this->order = (new OrderResource)->collect($order);
        $this->channelToken = $order->restaurant->token;
    }

    public function broadcastOn()
    {
        return new Channel('orders');
    }
}
