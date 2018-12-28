<?php

namespace App\Interfaces;

use App\Models\Order;

interface OrderServiceInterface
{
    public function placeOrder(array $data): Order;

   // public function calculatePrice(array $pizzas): float;
}