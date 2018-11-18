<?php

use Illuminate\Database\Seeder;

use App\Models\Pizza;

class PizzaIngredientsTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'ingredient_id' => 1,
                'pizza_id' => 1,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 1,
            ],
            [
                'ingredient_id' => 1,
                'pizza_id' => 2,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 2,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 3,
            ],
            [
                'ingredient_id' => 1,
                'pizza_id' => 3,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 3,
            ],
            [
                'ingredient_id' => 4,
                'pizza_id' => 3,
            ],
            [
                'ingredient_id' => 1,
                'pizza_id' => 4,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 4,
            ],
            [
                'ingredient_id' => 3,
                'pizza_id' => 4,
            ],
            [
                'ingredient_id' => 5,
                'pizza_id' => 4,
            ],
            [
                'ingredient_id' => 1,
                'pizza_id' => 5,
            ],
            [
                'ingredient_id' => 2,
                'pizza_id' => 5,
            ],
            [
                'ingredient_id' => 6,
                'pizza_id' => 5,
            ],
        ];

        foreach($data as $row) {
            $pizza = Pizza::find($row['pizza_id']);
            $pizza->ingredients()->attach($row['ingredient_id']);
        }
    }

}
