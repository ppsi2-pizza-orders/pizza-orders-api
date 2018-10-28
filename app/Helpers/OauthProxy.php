<?php

namespace App\Helpers;

use Hash;

use GuzzleHttp\Client as ProxyClient;
use GuzzleHttp\Exception\BadResponseException;

use App\Models\User;
use App\Exceptions\ApiException;
use App\Http\Resources\UserResource;

class OauthProxy
{
    protected $proxy_client;

    public function __construct(ProxyClient $proxy_client)
    {
        $this->proxy_client = $proxy_client;
    }

    public function attemptLogin($email, $password): array
    {
        $user = User::where('email', $email)->first();

        if (is_null($user) || !Hash::check($password, $user->password)) {
            throw (new ApiException())
                ->setMessage('Invalid login credentials')
                ->setErrorCode(400);
        }

        $oauth_response = $this->proxy('password', [
            'username' => $email,
            'password' => $password
        ]);

        return [
            'user' => new UserResource($user),
            'access_token' => $oauth_response['access_token']
        ];
    }

    public function proxy($grantType, array $login_credentials = []): array
    {
        $data['form_params'] = array_merge($login_credentials, [
            'client_id'     => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => $grantType
        ]);

        try {
            $response = $this->proxy_client->post($_SERVER['SERVER_NAME'] . '/oauth/token', $data);
        }
        catch (BadResponseException $exception) {
            throw (new ApiException())
                ->setMessage('Could not connect to OAUTH Server ')
                ->setErrorCode(503);
        }

        return json_decode($response->getBody(), true);
    }
}