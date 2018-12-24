<?php

use Faker\Generator as Faker;

use App\Models\Restaurant;
use App\Models\User;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(rand(1, 3)),
        'city' => $faker->city(),
        'address' => $faker->streetAddress(),
        'phone' => $faker->phoneNumber(),
        'description' => $faker->sentence(rand(10, 20)),
        'owner_id' => User::inRandomOrder()->first()->id,
        'photo' => 'public/restaurants/noimage.jpg',
        'visible' => true,
        'confirmed' => true,
    ];
});
