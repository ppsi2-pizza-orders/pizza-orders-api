<?php

use Illuminate\Database\Seeder;

use App\Models\Pizza;

class PizzasTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Margherita',
                'price' => 14,
                'image' => 'public/pizzas/noimage.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Fungi',
                'price' => 18,
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Salami',
                'price' => 20,
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Capriciosa',
                'price' => 23,
                'image' => 'public/ingredients/noimage.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Chicken',
                'price' => 22,
                'image' => 'public/ingredients/noimage.jpg',
            ],
        ];

        foreach($data as $row) {
            $model = Pizza::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
