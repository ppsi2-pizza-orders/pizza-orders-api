<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckIfUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!JWTAuth::user()->is_admin){
            return response(['messages' => "User is not admin"], 403);
        }
        return $next($request);
    }
}
