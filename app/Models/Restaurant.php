<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'photo',
        'description'
    ];

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function pizzas(){
        return $this->belongsToMany('App\Models\Pizza');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient', 'pizza_ingredient');
    }
}
