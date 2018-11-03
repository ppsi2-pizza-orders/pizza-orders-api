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
                ->setMessage('Token expired')
                ->setErrorCode(401);
        } catch (TokenInvalidException $exception) {
            throw (new ApiException)
                ->setMessage('Token invalid')
                ->setErrorCode(401);
        } catch (JWTException $exception) {
            throw (new ApiException)
                ->setMessage('Token absent')
                ->setErrorCode(401);
        }

        if (!$user) {
            throw (new ApiException)
                ->setMessage('User not found')
                ->setErrorCode(401);
        }

        return $next($request);
    }
}
