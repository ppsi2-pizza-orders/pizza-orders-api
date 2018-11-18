<?php

use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PizzasTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(PizzaIngredientsTableSeeder::class);

        factory(Restaurant::class, 50)->create();
        factory(Review::class, 400)->create();

        $this->call(PizzaRestaurantsTableSeeder::class);
    }
}
