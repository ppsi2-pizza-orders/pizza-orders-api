<?php

use Illuminate\Database\Seeder;

use App\Models\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'dodatkowy ser',
                'image' => 'public/ingredients/layers/additional_cheese.png',
                'thumbnail' => 'public/ingredients/thumbnails/additional_cheese.png',
                'index' => 1,
            ],
            [
                'id' => 2,
                'name' => 'szynka',
                'image' => 'public/ingredients/layers/ham.png',
                'thumbnail' => 'public/ingredients/thumbnails/ham.png',
                'index' => 2,
            ],
            [
                'id' => 3,
                'name' => 'mozzarella',
                'image' => 'public/ingredients/layers/mozzarella.png',
                'thumbnail' => 'public/ingredients/thumbnails/mozzarella.png',
                'index' => 3,
            ],
            [
                'id' => 4,
                'name' => 'salami',
                'image' => 'public/ingredients/layers/salami.png',
                'thumbnail' => 'public/ingredients/thumbnails/salami.png',
                'index' => 4,
            ],
            [
                'id' => 5,
                'name' => 'pepperoni',
                'image' => 'public/ingredients/layers/sausage.png',
                'thumbnail' => 'public/ingredients/thumbnails/sausage.png',
                'index' => 5,
            ],
            [
                'id' => 6,
                'name' => 'czerwona cebula',
                'image' => 'public/ingredients/layers/red_onion.png',
                'thumbnail' => 'public/ingredients/thumbnails/red_onion.png',
                'index' => 6,
            ],
            [
                'id' => 7,
                'name' => 'czerwona papryka',
                'image' => 'public/ingredients/layers/red_pepper.png',
                'thumbnail' => 'public/ingredients/thumbnails/red_pepper.png',
                'index' => 7,
            ],
            [
                'id' => 8,
                'name' => 'pieczarki',
                'image' => 'public/ingredients/layers/mushroom.png',
                'thumbnail' => 'public/ingredients/thumbnails/mushroom.png',
                'index' => 8,
            ],
            [
                'id' => 9,
                'name' => 'pomidory',
                'image' => 'public/ingredients/layers/tomato.png',
                'thumbnail' => 'public/ingredients/thumbnails/tomato.png',
                'index' => 9,
            ],
            [
                'id' => 10,
                'name' => 'papryczki chili',
                'image' => 'public/ingredients/layers/chili.png',
                'thumbnail' => 'public/ingredients/thumbnails/chili.png',
                'index' => 10,
            ],
            [
                'id' => 11,
                'name' => 'oliwki czarne',
                'image' => 'public/ingredients/layers/black_olive.png',
                'thumbnail' => 'public/ingredients/thumbnails/black_olive.png',
                'index' => 11,
            ],
            [
                'id' => 12,
                'name' => 'oliwki zielone',
                'image' => 'public/ingredients/layers/green_olive.png',
                'thumbnail' => 'public/ingredients/thumbnails/green_olive.png',
                'index' => 12,
            ],
        ];

        foreach($data as $row) {
            $model = Ingredient::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
