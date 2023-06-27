<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateAnalyst extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('analyst.login');
        }
    }

    protected function authenticate($request, array $guards)
    {
        
       if ($this->auth->guard('analyst')->check()) 
       {
            return $this->auth->shouldUse('analyst');
       }
        $this->unauthenticated($request, ['analyst']);
    }
}
