<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Services\AuthService;
use App\Helpers\ApiResponse;

class AuthController
{
    protected $auth_service;
    protected $response;

    public function __construct(AuthService $auth_service, ApiResponse $response)
    {
        $this->auth_service = $auth_service;
        $this->response = $response;
    }

    public function handleFacebookAuth(Request $request)
    {
        $fb_access_token = $request->get('access_token');

        $access_token = $this->auth_service->facebookAuth($fb_access_token);

        return $this->response
            ->setMessage('Access token granted')
            ->setData([
                'access_token' => $access_token
            ])
            ->get();
    }
}