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

        $price =  $pizza->price;

        $price += sizeof($pizzaOrder['ingredients']) * 5; // temp ( every ingredient costs 5 pln)
        return $price;
    }
}