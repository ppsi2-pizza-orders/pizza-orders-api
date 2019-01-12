<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class BasicAuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header('Cache-Control: no-cache, must-revalidate, max-age=0');

        if ($this->hasSuppliedCredentials() && $this->isAdmin()) {
            return $next($request);
        }

        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        exit;
    }

    private function hasSuppliedCredentials(): bool
    {
        return !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    }

    private function isAdmin(): bool
    {
        $credentials = [
            'email' => $_SERVER['PHP_AUTH_USER'],
            'password' => $_SERVER['PHP_AUTH_PW'],
        ];

        if (Auth::once($credentials))
        {
            $user = Auth::user();
            return $user && $user->is_admin;
        }

        return false;
    }
}
