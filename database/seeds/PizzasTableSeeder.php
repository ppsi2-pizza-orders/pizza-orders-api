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
            ],
            [
                'id' => 2,
                'name' => 'Fungi',
                'price' => 18,
            ],
            [
                'id' => 3,
                'name' => 'Salami',
                'price' => 20,
            ],
            [
                'id' => 4,
                'name' => 'Capriciosa',
                'price' => 23,
            ],
            [
                'id' => 5,
                'name' => 'Chicken',
                'price' => 21.38,
            ],
        ];

        foreach($data as $row) {
            $model = Pizza::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
