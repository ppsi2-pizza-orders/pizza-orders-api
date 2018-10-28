<?php

namespace App\Services;

use App\Helpers\OauthProxy;
use Socialite;
use Exception;
use Hash;

use App\Models\User;
use Laravel\Socialite\Two\User as SocialUser;

use App\Exceptions\ApiException;

class AuthService
{
    protected $oauth_proxy;

    public function __construct(OauthProxy $oauth_proxy)
    {
        $this->oauth_proxy = $oauth_proxy;
    }

    public function loginUser(array $data): array
    {
        return $this->oauth_proxy->attemptLogin($data['email'], $data['password']);
    }

    public function registerUser(array $data): array
    {
        $not_hashed_password = $data['password'];
        $data['password'] = Hash::make($not_hashed_password);
        $user = User::create($data);

        return $this->oauth_proxy->attemptLogin($user->email, $not_hashed_password);
    }

    public function facebookLogin(string $fb_access_token = null): array
    {
        try {
            $fb_user = Socialite::driver('facebook')
                ->userFromToken($fb_access_token);
        } catch (Exception $exception) {
            throw (new ApiException())
                ->setErrorCode(400)
                ->setMessage('Could not fetch Facebook account');
        }

        $user = $this->findOrNewUser($fb_user, 'facebook');

        $email = $user->email;
        $not_hashed_password = $user->password;

        $user->password = Hash::make($not_hashed_password);
        $user->save();

        return $this->oauth_proxy->attemptLogin($email, $not_hashed_password);
    }

    private function findOrNewUser(SocialUser $social_user, string $provider): User
    {
        $already_created_user = User::where('provider_id', $social_user->id)->first();

        if ($already_created_user) {
            return $already_created_user;
        }

        $already_created_user = User::where('email', $social_user->email)->first();

        if ($already_created_user) {
            throw (new ApiException())
                ->setErrorCode(400)
                ->setMessage('User with email provided in Facebook already is registered');
        }

        $data = [
            'name' => $social_user->name,
            'email' => $social_user->email,
            'password' => str_random(64),
            'provider' => $provider,
            'provider_id' => $social_user->id
        ];

        $user = new User($data);
        return $user;
    }


}