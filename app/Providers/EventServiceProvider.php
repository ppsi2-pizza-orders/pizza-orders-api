<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\OrderPlaced;
use App\Listener\OrderPlacedListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OrderPlaced::class => [
            OrderPlacedListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
