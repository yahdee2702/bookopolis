<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    private $redirect = [
        'admin' => 'admin.login',
        'user' => 'user.login'
    ];

    protected function unauthenticated($request, array $guards)
    {
        error_log("Not authenticated");
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->specificRedirectTo($request, $guards)
        );
    }

    protected function specificRedirectTo(Request $request, array $guards)
    {
        foreach ($guards as $guard) {
            return $request->expectsJson() ? null : route($this->redirect[$guard] ?? 'home');
        }
        return null;
    }
}
