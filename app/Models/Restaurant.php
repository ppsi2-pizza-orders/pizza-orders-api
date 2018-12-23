<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'city', 'address', 'phone', 'photo', 'description', 'owner_id', 'photo'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }
}
