<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'city', 'address', 'phone', 'photo', 'description', 'owner_id', 'photo', 'visible', 'confirmed'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('price', 'available');
    }

    public function getReviewStars(): float
    {
       return floor($this->reviews()->avg('average_rating') * 2) / 2;
    }

    public function isReadyForPublication(): bool
    {
        return $this->name &&
            $this->city &&
            $this->address &&
            $this->phone &&
            $this->description;
    }

}
