<?php

namespace App\Services;

use Auth;
use Socialite;
use Exception;
use Hash;

use App\Models\User;
use Laravel\Socialite\Two\User as SocialUser;

use App\Exceptions\ApiException;

class AuthService
{
    public function registerUser(array $data): User
    {
        return User::create($data);
    }

    public function facebookAuth(string $fb_access_token): string
    {
        if (!$fb_access_token) {
            throw (new ApiException())->setMessage('Access token not provided');
        }

        try {
            $fb_user = Socialite::driver('facebook')
                ->userFromToken($fb_access_token);
        } catch (Exception $exception) {
            throw (new ApiException())
                ->setErrorCode(400)
                ->setMessage('Could not fetch Facebook account');
        }

        $user = $this->findOrCreateUser($fb_user, 'facebook');

        return $user->createToken('Api Token')->accessToken;
    }

    private function findOrCreateUser(SocialUser $social_user, string $provider): User
    {
        $already_created_user = User::where('provider_id', $social_user->id)->first();

        if ($already_created_user) {
            return $already_created_user;
        }

        $data = [
            'name' => $social_user->name,
            'email' => $social_user->email,
            'password' => str_random(64),
            'provider' => $provider,
            'provider_id' => $social_user->id
        ];

        return $this->registerUser($data);
    }


}