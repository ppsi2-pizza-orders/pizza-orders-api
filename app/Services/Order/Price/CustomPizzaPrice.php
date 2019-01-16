<?php

namespace App\Services\Order\Price;

class CustomPizzaPrice extends OrderPriceCalculator
{
    public function calculate(array $pizzaOrder): float
    {
        $price = 14;
        $restaurant = $this->order->restaurant;

        foreach ($pizzaOrder['ingredients'] as $id) {
            $ingredient = $restaurant->ingredients()
                ->where('available', true)
                ->where('ingredient_id', $id)
                ->firstOrFail();

            $price += $ingredient->pivot->price;
        }

        return $price;
    }
}