<?php

namespace App\Services;

use Socialite;
use Exception;
use Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Models\User;
use Laravel\Socialite\Two\User as SocialUser;
use App\Exceptions\ApiException;

class AuthService
{
    public function attemptLogin(array $credentials): array
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                throw (new ApiException())
                    ->setErrorCode(400)
                    ->setMessage('Invalid login credentials');
            }
        } catch (JWTException $e) {
            throw (new ApiException())
                ->setErrorCode(500)
                ->setMessage('Could not create JWT Token');
        }

        return compact('token');
    }

    public function registerUser(array $data): array
    {
        $nonHashedPassword = $data['password'];
        $data['password'] = Hash::make($nonHashedPassword);
        $data['name'] = strstr($data['email'], '@', true);
        $user = User::create($data);

        return $this->attemptLogin([
            'email' => $user->email,
            'password' => $nonHashedPassword,
        ]);
    }

    public function facebookLogin(string $fbAccessToken = null): array
    {
        try {
            $fbUser = Socialite::driver('facebook')
                ->userFromToken($fbAccessToken);
        } catch (Exception $exception) {
            throw (new ApiException())
                ->setErrorCode(400)
                ->setMessage('Could not fetch Facebook account');
        }

        $user = $this->findOrNewUser($fbUser, 'facebook');

        $nonHashedPassword = $user->password;
        $user->password = Hash::make($nonHashedPassword);
        $user->save();

        return $this->attemptLogin([
            'email' => $user->email,
            'password' => $nonHashedPassword,
        ]);
    }

    private function findOrNewUser(SocialUser $socialUser, string $provider): User
    {
        $alreadyCreatedUser = User::where('provider_id', $socialUser->id)->first();

        if ($alreadyCreatedUser) {
            return $alreadyCreatedUser;
        }

        $alreadyCreatedUser = User::where('email', $socialUser->email)->first();

        if ($alreadyCreatedUser) {
            throw (new ApiException())
                ->setErrorCode(400)
                ->setMessage('User with email provided in Facebook already is registered');
        }

        $data = [
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'password' => str_random(64),
            'provider' => $provider,
            'provider_id' => $socialUser->id
        ];

        $user = new User($data);
        return $user;
    }


}