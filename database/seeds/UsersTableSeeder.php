<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'password' => Hash::make('test123'),
                'name' => 'Administrator PizzaOrders',
                'email' => 'admin@example.com',
                'provider' => 'app',
                'is_admin' => true,
            ],
            [
                'id' => 2,
                'password' => Hash::make('test123'),
                'name' => 'Testowy klient',
                'email' => 'client@example.com',
                'provider' => 'app',
                'is_admin' => false,
            ],
            [
                'id' => 3,
                'password' => Hash::make('test123'),
                'name' => 'Testowy własciciel',
                'email' => 'owner@example.com',
                'provider' => 'app',
                'is_admin' => false,
            ],
            [
                'id' => 4,
                'password' => Hash::make('test123'),
                'name' => 'Testowy manager',
                'email' => 'manager@example.com',
                'provider' => 'app',
                'is_admin' => false,
            ],
            [
                'id' => 5,
                'password' => Hash::make('test123'),
                'name' => 'Testowy kucharz',
                'email' => 'cook@example.com',
                'provider' => 'app',
                'is_admin' => false,
            ],
        ];

        foreach($data as $row) {
            $model = User::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
