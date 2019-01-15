<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckIfUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        $admin = JWTAuth::user()->is_admin;
        if ($admin != 1){
            return response(['messages' => "User is not admin"], 403);
        }
        return $next($request);
    }
}
