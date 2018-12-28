<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Models\Review;
use App\Models\Restaurant;

use App\Observers\ReviewObserver;
use App\Observers\RestaurantObserver;

class ObserverServiceProvider extends ServiceProvider
{

    public function boot(): void {
        Review::observe(ReviewObserver::class);
        Restaurant::observe(RestaurantObserver::class);
    }

    public function register(): void {}

}
