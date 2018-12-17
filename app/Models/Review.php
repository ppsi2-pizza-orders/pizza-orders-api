<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'base_rating',
        'ingredients_rating',
        'delivery_time_rating',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
