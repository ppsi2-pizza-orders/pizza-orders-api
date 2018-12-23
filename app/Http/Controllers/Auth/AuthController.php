<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\LoginUser;
use App\Http\Requests\FacebookLoginUser;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        parent::__construct();
    }

    public function login(LoginUser $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->authService->attemptLogin($credentials);

        return $this->apiResponse
            ->pushMessage('User logged in successfully')
            ->setData($token)
            ->response();
    }

    public function refreshToken(Request $request)
    {
        JWTAuth::setRequest($request);
        $token = $this->authService->refreshToken();
        return $this->apiResponse
            ->pushMessage('Token refreshed')
            ->setData($token)
            ->response();
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

        return $this->apiResponse
            ->pushMessage('User successfully registered')
            ->setData($token)
            ->response();
    }

    public function facebookLogin(FacebookLoginUser $request)
    {
        $fbAccessToken = $request->get('access_token');

        $response = $this->authService->facebookLogin($fbAccessToken);

        return $this->apiResponse
            ->pushMessage('User successfully authenticated through Facebook')
            ->setData($response)
            ->response();
    }
}