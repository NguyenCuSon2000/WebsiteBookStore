<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        // if ( !Auth::user() || Auth::user()->role->name != $role) {
        //     return redirect()->route('login');
        // }
        // return $next($request);
        if ( Auth::user()->role->name == 'admin') {
            return $next($request);
        }
        return redirect()->route('login_auth');
    }
}
