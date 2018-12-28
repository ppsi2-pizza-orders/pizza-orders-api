<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name', 'image',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class)->withPivot('pizza_ingredient');
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
