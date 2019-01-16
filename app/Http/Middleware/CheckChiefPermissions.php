<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckChiefPermissions
{
    public function handle($request, Closure $next)
    {
        $restaurant = JWTAuth::user()->restaurants->find($request->id);
        if (!$restaurant || $restaurant->pivot->role != 3){
            return response(['messages' => "No permission to perform this action"], 403);
        }

        return $next($request);
    }
}