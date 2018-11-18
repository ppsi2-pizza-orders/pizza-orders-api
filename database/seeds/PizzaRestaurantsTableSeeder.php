<?php

use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Pizza;

class PizzaRestaurantsTableSeeder extends Seeder
{
    public function run(): void
    {
        foreach(Restaurant::all() as $restaurant) {
            foreach(Pizza::all() as $pizza) {
                $restaurant->pizzas()->attach($pizza);
            }
        }
    }

}
