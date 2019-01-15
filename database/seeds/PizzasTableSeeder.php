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
                'price' => 17,
            ],
            [
                'id' => 2,
                'name' => 'Capriciosa',
                'price' => 20,
            ],
            [
                'id' => 3,
                'name' => 'Serowa',
                'price' => 20,
            ],
            [
                'id' => 4,
                'name' => 'Pepperoni',
                'price' => 20,
            ],
            [
                'id' => 5,
                'name' => 'Hot Pepperoni',
                'price' => 25,
            ],
            [
                'id' => 6,
                'name' => 'Fungi',
                'price' => 20,
            ],
            [
                'id' => 7,
                'name' => 'Mexicana',
                'price' => 28,
            ],
            [
                'id' => 8,
                'name' => 'Italiana',
                'price' => 30,
            ],
        ];

        foreach($data as $row) {
            $model = Pizza::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
