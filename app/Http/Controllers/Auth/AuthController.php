<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Services\AuthService;
use App\Helpers\ApiResponse;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\LoginUser;
use App\Http\Requests\FacebookLoginUser;

class AuthController
{
    protected $authService;
    protected $response;

    public function __construct(AuthService $authService, ApiResponse $response)
    {
        $this->authService = $authService;
        $this->response = $response;
    }

    public function login(LoginUser $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->authService->attemptLogin($credentials);

        return $this->response
            ->setMessage('User logged in successfully')
            ->setData($token)
            ->get();
    }

    public function register(RegisterUser $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'provider' => 'app',
            'provider_id' => null
        ];

        $token = $this->authService->registerUser($data);

        return $this->response
            ->setMessage('User successfully registered')
            ->setData($token)
            ->get();
    }

    public function facebookLogin(FacebookLoginUser $request)
    {
        $fbAccessToken = $request->get('access_token');

        $response = $this->authService->facebookLogin($fbAccessToken);

        return $this->response
            ->setMessage('User successfully authenticated through Facebook')
            ->setData($response)
            ->get();
    }
}