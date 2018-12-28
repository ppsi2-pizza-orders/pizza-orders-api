<?php

namespace App\Services\Order\Description;

use App\Models\Ingredient;

class CustomizedMenuPizzaDescription extends OrderDescriptionGenerator
{
    public function generate(array $pizzaOrder): string
    {
        $pizza = $this->order
            ->restaurant
            ->pizzas()
            ->findOrFail($pizzaOrder['id']);

        $ingredients = $pizza->ingredients->pluck('name')->toArray();
        $additionalIngredients = Ingredient::whereIn('id', $pizzaOrder['ingredients'])
            ->get()
            ->pluck('name')
            ->toArray();

        return  __('Customized')
            . " '$pizza->name': "
            . implode(', ', $ingredients)
            . ' + ( '
            . implode(', ', $additionalIngredients)
            . ' )';
    }
}