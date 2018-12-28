<?php

namespace App\Services\Order\Description;

use App\Models\Ingredient;

class CustomPizzaDescription extends OrderDescriptionGenerator
{
    public function generate(array $pizzaOrder): string
    {
        $ingredients = Ingredient::whereIn('id', $pizzaOrder['ingredients'])
            ->get()
            ->pluck('name')
            ->toArray();

        return __('Custom Pizza') . ': ' .implode(', ', $ingredients);
    }
}