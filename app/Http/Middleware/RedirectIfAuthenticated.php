<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    private $redirect = [
        'admin' => 'admin.home',
        'user' => 'home'
    ];

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        error_log("Already authenticated");

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(route($this->redirect[$guard]));
            }
        }

        return $next($request);
    }
}
