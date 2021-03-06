<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'price'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('order_pizzas');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function attachIngredients(array $ingredients)
    {
        foreach ($ingredients as $ingredientId) {
            $ingredient = Ingredient::findOrFail($ingredientId);
            $this->ingredients()->attach($ingredient);
        }
    }
}

