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
                'name' => 'Jan Kowalski',
                'email' => 'example@example.com',
                'provider' => 'app',
                'is_admin' => true,
            ],
        ];

        foreach($data as $row) {
            $model = User::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }

}
