<?php

namespace App\Services;

use Hash;

use App\Models\User;
use Laravel\Socialite\Two\User as SocialUser;

class AuthService
{
    public function findOrCreateUser(SocialUser $social_user, string $provider): User
    {
        $already_created_user = User::where('provider_id', $social_user->id)->first();

        if ($already_created_user) {
            return $already_created_user;
        }

        return User::create([
            'name' => $social_user->name,
            'email' => $social_user->email,
            'password' => Hash::make(str_random(64)),
            'provider' => $provider,
            'provider_id' => $social_user->id
        ]);
    }


}