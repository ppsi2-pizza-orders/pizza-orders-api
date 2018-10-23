<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use Redirect;
use Exception;
use Illuminate\Http\Request;

use App\Services\AuthService;
use App\Exceptions\ApiException;
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

        if(!$fb_access_token) {
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

        $user = $this->auth_service->findOrCreateUser($fb_user, 'facebook');

        $access_token = $user->createToken('Api Token')->accessToken;

        return $this->response
            ->setMessage('Access token granted')
            ->setData([
                'access_token' => $access_token
            ])
            ->get();
    }
}