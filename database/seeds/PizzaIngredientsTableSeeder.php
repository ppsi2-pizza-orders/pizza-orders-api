<?php

use Illuminate\Database\Seeder;

use App\Models\Pizza;

class PizzaIngredientsTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [ // margherita
                'pizza_id' => 1,
                'ingredient_id' => 1,
            ],
            [ // capriciosa
                'pizza_id' => 2,
                'ingredient_id' => 2,
            ],
            [
                'pizza_id' => 2,
                'ingredient_id' => 8,
            ],
            [ // serowa
                'pizza_id' => 3,
                'ingredient_id' => 1,
            ],
            [
                'pizza_id' => 3,
                'ingredient_id' => 3,
            ],
            [ // pepperoni
                'pizza_id' => 4,
                'ingredient_id' => 5,
            ],
            [ // hot pepperoni
                'pizza_id' => 5,
                'ingredient_id' => 5,
            ],
            [
                'pizza_id' => 5,
                'ingredient_id' => 6,
            ],
            [
                'pizza_id' => 5,
                'ingredient_id' => 10,
            ],
            [ // fungi
                'pizza_id' => 6,
                'ingredient_id' => 1,
            ],
            [
                'pizza_id' => 6,
                'ingredient_id' => 8,
            ],
            [ // mexicana
                'pizza_id' => 7,
                'ingredient_id' => 4,
            ],
            [
                'pizza_id' => 7,
                'ingredient_id' => 7,
            ],
            [
                'pizza_id' => 7,
                'ingredient_id' => 10,
            ],
            [ // italiana
                'pizza_id' => 8,
                'ingredient_id' => 3,
            ],
            [
                'pizza_id' => 8,
                'ingredient_id' => 2,
            ],
            [
                'pizza_id' => 8,
                'ingredient_id' => 11,
            ],
            [
                'pizza_id' => 8,
                'ingredient_id' => 12,
            ],
        ];

        foreach($data as $row) {
            $pizza = Pizza::find($row['pizza_id']);
            $pizza->ingredients()->attach($row['ingredient_id']);
        }
    }

}
