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

        if($request->user()->role_id == 1){
           return redirect('/home');
        }
        else if($request->user()->role_d == 2)
        {
            return redirect('/admin');
        }
        // if (Auth::guard($guard)->check()) {

        // }

        return $next($request);
    }
}
