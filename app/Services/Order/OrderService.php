<?php

namespace App\Services\Order;

use App\Events\OrderPlaced;
use App\Interfaces\OrderServiceInterface;
use App\Models\Order;
use App\Models\Pizza;

class OrderService implements OrderServiceInterface
{
    public function placeOrder(array $data): Order
    {
        $order = Order::create([
            'user_id' => $data['user_id'],
            'restaurant_id' => $data['restaurant_id'],
            'delivery_address' => $data['delivery_address'],
            'phone_number' => $data['phone_number'],
            'token' => str_random(16),
            'price' => $this->calculatePrice($data['pizzas'])
        ]);

        foreach($data['pizzas'] as $id) {
            $pizza = $order->restaurant->pizzas()->findOrFail($id);
            $order->pizzas()->attach($pizza->id);
        }

        event(new OrderPlaced($order));

        return $order;
    }

    public function calculatePrice(array $pizzas): float
    {
        $price = 0;
        foreach($pizzas as $id) {
            $pizza = Pizza::findOrFail($id);
            $price += $pizza->price;
        }

        return $price;
    }
}