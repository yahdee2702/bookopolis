<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if (auth($guard)->check()) {
                $user = auth($guard)->user();
                $key = "is_online_${guard}_".$user->id;

                if (!cache()->has($key)) {
                    cache()->add($key, true, Carbon::now()->addMinutes(1));
                    $user->last_seen = Carbon::now();
                    $user->timestamps = false;
                    $user->save();
                    $user->timestamps = true;
                }
            }
        }
        return $next($request);
    }
}
