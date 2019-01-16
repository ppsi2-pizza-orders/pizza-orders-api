<?php

namespace App\Services\Order\Price;

class CustomizedMenuPizzaPrice extends OrderPriceCalculator
{
    public function calculate(array $pizzaOrder): float
    {
        $pizza = $this->order
            ->restaurant
            ->pizzas()
            ->findOrFail($pizzaOrder['id']);

        $restaurant = $this->order->restaurant;
        $price = $pizza->price;

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