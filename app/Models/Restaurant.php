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
}
