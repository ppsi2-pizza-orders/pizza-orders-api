<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'available'
    ];

    public function pizzas(){
        return $this->belongsToMany('App\Models\Pizza');
    }
}
