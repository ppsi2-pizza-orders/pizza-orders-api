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
                'name' => 'sos pomidorowy',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 2,
                'name' => 'ser',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 3,
                'name' => 'pieczarki',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 4,
                'name' => 'salami',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 5,
                'name' => 'szynka',
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 6,
                'name' => 'kurczak',
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
