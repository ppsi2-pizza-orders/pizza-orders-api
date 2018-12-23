<?php

namespace App\Services;

use Socialite;
use Exception;
use Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Laravel\Socialite\Two\User as SocialUser;

use App\Models\User;
use App\Exceptions\ApiException;

class AuthService
{
    public function refreshToken(): array
    {
        $apiException = new ApiException;
        try {
            JWTAuth::parseToken()->authenticate();
            throw $apiException
                ->pushMessage('Token not expired')
                ->setStatusCode(400);
        } catch (TokenExpiredException $exception) {
            $token = JWTAuth::refresh();
            return compact('token');
        } catch (TokenInvalidException $exception) {
            throw $apiException
                ->pushMessage('Token invalid')
                ->setStatusCode(401);
        } catch (JWTException $exception) {
            throw $apiException
                ->pushMessage('Token absent')
                ->setStatusCode(401);
        }
    }

    public function attemptLogin(array $credentials): array
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                throw (new ApiException())
                    ->setStatusCode(400)
                    ->pushMessage('Invalid login credentials');
            }
        } catch (JWTException $e) {
            throw (new ApiException())
                ->setStatusCode(500)
                ->pushMessage('Could not create JWT Token');
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
                ->setStatusCode(400)
                ->pushMessage('Could not fetch Facebook account');
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
                ->setStatusCode(400)
                ->pushMessage('User with email provided in Facebook already is registered');
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