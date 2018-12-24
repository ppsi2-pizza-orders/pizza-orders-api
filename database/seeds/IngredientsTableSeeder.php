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
                'name' => 'sauce',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 2,
                'name' => 'cheese',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 3,
                'name' => 'mushrooms',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 4,
                'name' => 'salami',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 5,
                'name' => 'ham',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 6,
                'name' => 'chicken',
                'image' => 'public/ingredients/noimage.jpg',
            ],
        ];

        foreach($data as $row) {
            $model = Ingredient::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
