<?php

use Faker\Generator as Faker;

use App\Models\Pizza;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'name' => $faker->words(rand(1, 3)),
        'price' => $faker->randomFloat(2, 10, 30),
    ];
});
