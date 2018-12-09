<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

use App\Exceptions\ApiException;

class Authenticate
{
    public function handle($request, \Closure $next)
    {
        try {
            JWTAuth::setRequest($request);
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException  $exception) {
            throw (new ApiException)
                ->pushMessage('Token expired')
                ->setStatusCode(401);
        } catch (TokenInvalidException $exception) {
            throw (new ApiException)
                ->pushMessage('Token invalid')
                ->setStatusCode(401);
        } catch (JWTException $exception) {
            throw (new ApiException)
                ->pushMessage('Token absent')
                ->setStatusCode(401);
        }

        if (!$user) {
            throw (new ApiException)
                ->pushMessage('User not found')
                ->setStatusCode(401);
        }

        return $next($request);
    }
}
