<?php

namespace App\Listener;

use App\Events\OrderPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedListener
{
    public function __construct()
    {
        //
    }

    public function handle(OrderPlaced $event)
    {
        //
    }
}
