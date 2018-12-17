<?php

use App\Models\Order;

Broadcast::channel('order.{token}', function ($user, $token) {
    return $user->id === Order::where('token', $token)->firstOrFail()->user_id;
});

