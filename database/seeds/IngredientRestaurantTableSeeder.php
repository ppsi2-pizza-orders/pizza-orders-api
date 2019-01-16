<?php

use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Ingredient;

class IngredientRestaurantTableSeeder extends Seeder
{
    public function run(): void
    {
        foreach(Restaurant::all() as $restaurant) {
            foreach(Ingredient::all() as $ingredient) {
                $restaurant->ingredients()->attach($ingredient, ['price' => rand(4, 8), 'available' => true]);
            }
        }
    }

}
