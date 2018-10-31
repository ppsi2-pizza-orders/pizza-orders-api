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
    protected $auth_service;
    protected $response;

    public function __construct(AuthService $auth_service, ApiResponse $response)
    {
        $this->auth_service = $auth_service;
        $this->response = $response;
    }

    public function login(LoginUser $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        $response = $this->auth_service->loginUser($data);

        return $this->response
            ->setMessage('User successfully authenticated')
            ->setData($response)
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

        $response = $this->auth_service->registerUser($data);

        return $this->response
            ->setMessage('User successfully registered')
            ->setData($response)
            ->get();
    }

    public function facebookLogin(FacebookLoginUser $request)
    {
        $fb_access_token = $request->get('access_token');

        $response = $this->auth_service->facebookLogin($fb_access_token);

        return $this->response
            ->setMessage('User successfully authenticated through Facebook')
            ->setData($response)
            ->get();
    }
}