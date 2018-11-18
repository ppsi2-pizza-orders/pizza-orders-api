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
            ],
            [
                'id' => 2,
                'name' => 'cheese',
            ],
            [
                'id' => 3,
                'name' => 'mushrooms',
            ],
            [
                'id' => 4,
                'name' => 'salami',
            ],
            [
                'id' => 5,
                'name' => 'ham',
            ],
            [
                'id' => 6,
                'name' => 'chicken',
            ],
        ];

        foreach($data as $row) {
            $model = Ingredient::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
