<?php

namespace App\Services\Order\Description;

class MenuPizzaDescription extends OrderDescriptionGenerator
{
    public function generate(array $pizzaOrder): string
    {
        $pizza = $this->order
            ->restaurant
            ->pizzas()
            ->findOrFail($pizzaOrder['id']);

        $ingredients = $pizza->ingredients()->pluck('name')->toArray();

        return "Pizza '$pizza->name': " .  implode(', ', $ingredients);
    }
}