<?php

namespace App\Services\Order\Price;

class MenuPizzaPrice extends OrderPriceCalculator
{
    public function calculate(array $pizzaOrder): float
    {
        $pizza = $this->order
            ->restaurant
            ->pizzas()
            ->findOrFail($pizzaOrder['id']);

        return $pizza->price;
    }
}