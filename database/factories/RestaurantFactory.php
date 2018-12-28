<?php

use Faker\Generator as Faker;

use App\Models\Restaurant;
use App\Models\User;

$names = [
    'Da Grasso', 'Pizza Hut', 'Nocne Gastro', 'Super Pizza', 'Mega Pizza', 'King Pizza', 'Botan Pizza', 'Domowa Pizza',
    'Pizza u Janusza', 'Polska Pizza', 'Pizzex', 'Pizzapol', 'Pizza u Szwagra', 'Dobra Pizza', 'Pyszna pizza', 'Smaczna Pizza',
    'Tania Pizza', 'Pizzeria Roma', 'Pizzeria Napoli', 'Crusty Pizza', 'Fajna Pitca', 'Pizza Station', 'Pizza Planet'
];

$cities = [
    'Legnica', 'Wrocław', 'Warszawa', 'Sosnowiec', 'Kraków', 'Gdańsk', 'Poznań'
];

$factory->define(Restaurant::class, function (Faker $faker) use ($names, $cities) {
    return [
        'name' => $names[rand(0, sizeof($names) - 1)],
        'city' => $cities[rand(0, sizeof($cities) - 1)],
        'address' => $faker->streetAddress(),
        'phone' => $faker->phoneNumber(),
        'description' => $faker->realText(),
        'owner_id' => 3,
        'photo' => 'public/restaurants/noimage.jpg',
        'visible' => true,
        'confirmed' => true,
    ];
});
