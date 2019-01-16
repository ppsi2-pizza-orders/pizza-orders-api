<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use App\Models\User;

class CheckOwnerPermissions
{
    public function handle($request, Closure $next)
    {
        $restaurant = JWTAuth::user()->restaurants->find($request->id);
        if (!$restaurant || $restaurant->pivot->role !== User::ROLE_OWNER){
            return response(['messages' => "No permission to perform this action"], 403);
        }

        return $next($request);
    }
}
