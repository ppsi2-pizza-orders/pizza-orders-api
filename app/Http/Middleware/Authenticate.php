<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

use App\Helpers\ApiResponse;

class Authenticate
{
    protected $auth;
    protected $response;

    public function __construct(Auth $auth, ApiResponse $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }

    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response()->json(
                $this->response->setMessage('User unauthorized')->get(),
                401);
        }

        return $next($request);
    }
}
