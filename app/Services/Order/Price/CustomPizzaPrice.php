<?php

namespace App\Services\Order\Price;

use App\Models\Ingredient;

class CustomPizzaPrice extends OrderPriceCalculator
{
    public function calculate(array $pizzaOrder): float
    {
        $ingredients = Ingredient::whereIn('id', $pizzaOrder['ingredients'])->count();
        return $ingredients * 5; // temp ( every ingredient costs 5 pln)
    }
}