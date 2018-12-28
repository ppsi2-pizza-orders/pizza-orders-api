<?php

namespace App\Observers;

use App\Models\Restaurant;

class RestaurantObserver
{
    public function creating(Restaurant $restaurant)
    {
        $restaurant->token = str_random(16);
    }
}
