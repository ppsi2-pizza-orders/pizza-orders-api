<?php

namespace App\Http\Middleware;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

use App\Exceptions\ApiException;

class Authenticate
{
    public function handle($request, \Closure $next)
    {
        $apiException = new ApiException;
        try {
            JWTAuth::setRequest($request);
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException  $exception) {
            throw $apiException
                ->pushMessage('Token expired')
                ->setStatusCode(401);
        } catch (TokenInvalidException $exception) {
            throw $apiException
                ->pushMessage('Token invalid')
                ->setStatusCode(401);
        } catch (JWTException $exception) {
            throw $apiException
                ->pushMessage('Token absent')
                ->setStatusCode(401);
        }

        if (!$user) {
            throw $apiException
                ->pushMessage('User not found')
                ->setStatusCode(401);
        }

        return $next($request);
    }
}
