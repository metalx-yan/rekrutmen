<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role->name == 'direktu') {
                return redirect('/direktur');
            } elseif (Auth::user()->role->name == 'hrd') {
                return redirect('/hrd');
            } elseif (Auth::user()->role->name == 'user') {
                return redirect('/user');
            }
        }

        return $next($request);
    }
}
