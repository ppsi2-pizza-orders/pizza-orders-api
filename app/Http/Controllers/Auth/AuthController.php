<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Services\AuthService;
use App\Helpers\ApiResponse;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterUser;

class AuthController
{
    protected $auth_service;
    protected $response;

    public function __construct(AuthService $auth_service, ApiResponse $response)
    {
        $this->auth_service = $auth_service;
        $this->response = $response;
    }

    public function register(RegisterUser $request)
    {
        $data = [
            'name' => $request->get('email'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'provider' => 'app',
            'provider_id' => null
        ];

        $user = $this->auth_service->registerUser($data);

        return $this->response
            ->setMessage('User successfully registered')
            ->setData([
                'access_token' => $user->createToken('Api Token')->accessToken,
                'user' => new UserResource($user)
            ])
            ->get();
    }

    public function handleFacebookAuth(Request $request)
    {
        $fb_access_token = $request->get('access_token');

        $user = $this->auth_service->facebookAuth($fb_access_token);

        return $this->response
            ->setMessage('User successfully authenticated through Facebook')
            ->setData([
                'access_token' => $user->createToken('Api Token')->accessToken,
                'user' => new UserResource($user),
            ])
            ->get();
    }
}