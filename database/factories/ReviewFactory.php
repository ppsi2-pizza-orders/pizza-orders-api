<?php

use Faker\Generator as Faker;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Review;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'base_rating' => rand(1, 5),
        'ingredients_rating' => rand(1, 5),
        'delivery_time_rating' => rand(1, 5),
        'comment' => $faker->sentence(rand(2, 10)),
        'user_id' => User::inRandomOrder()->first()->id,
        'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
    ];
});
