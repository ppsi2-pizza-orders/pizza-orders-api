<?php

use Illuminate\Database\Seeder;

use App\Models\Restaurant;

class RestaurantUserTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'restaurant_id' => 1,
                'user_id' => 3,
                'role' => 1
            ],
            [
                'id' => 1,
                'restaurant_id' => 1,
                'user_id' => 4,
                'role' => 2
            ],
            [
                'id' => 1,
                'restaurant_id' => 1,
                'user_id' => 5,
                'role' => 3
            ],
        ];

        foreach($data as $row) {
            $restaurant = Restaurant::find($row['restaurant_id']);
            $restaurant->users()->attach($row['user_id'], ['role' => $row['role']]);
        }
    }
}
