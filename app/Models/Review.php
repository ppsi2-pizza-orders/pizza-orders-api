<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'base_rating',
        'ingredients_rating',
        'delivery_time_rating',
        'comment'
    ];
}
