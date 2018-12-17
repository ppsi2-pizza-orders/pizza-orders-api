<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image'
    ];

    public function restaurants()
    {
        return $this->belongsToMany('App\Models\Restaurant');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('pizza_order');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient', 'pizza_ingredient');
    }
}
