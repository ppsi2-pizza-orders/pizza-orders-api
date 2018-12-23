<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'price', 'image'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }
}

