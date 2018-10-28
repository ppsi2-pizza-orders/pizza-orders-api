<?php

namespace App\Helpers;

use App;
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
            'client_id'     => config('oauth.client_id'),
            'client_secret' => config('oauth.client_secret'),
            'grant_type'    => $grantType
        ]);

        if (App::environment() === 'dev') {
            $url = 'localhost' . '/oauth/token';
        } else {
            $url = url('/oauth/token');
        }

        try {
            $response = $this->proxy_client->post($url, $data);
        }
        catch (BadResponseException $exception) {
            throw (new ApiException())
                ->setMessage('Could not connect to OAUTH Server ')
                ->setErrorCode(503);
        }

        return json_decode($response->getBody(), true);
    }
}