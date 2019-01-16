<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckManagerPermissions
{
    public function handle($request, Closure $next)
    {
        $restaurant = JWTAuth::user()->restaurants->find($request->id);
        if (!$restaurant || $restaurant->pivot->role != 2){
            return response(['messages' => "No permission to perform this action"], 403);
        }

        return $next($request);
    }
}
