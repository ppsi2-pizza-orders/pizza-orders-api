<?php

use App\Models\Order;
use App\Models\Restaurant;

Broadcast::channel('order.{token}', function ($user, $token) {
    return true;
});

Broadcast::channel('restaurant.{token}', function ($user, $token) {
    return Restaurant::where('token', $token)
            ->firstOrFail()
            ->users()
            ->where('user_id', $user->id)
            ->firstOrFail();
});
