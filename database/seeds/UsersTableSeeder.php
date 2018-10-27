<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->password= Hash::make("test123");
        $user->name= "exampleuser";
        $user->email= "example@example.com";
        $user->save();
    }

}
