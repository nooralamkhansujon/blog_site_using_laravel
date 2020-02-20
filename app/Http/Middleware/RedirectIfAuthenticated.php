<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

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

        //dd($request->user()->role_id);

        if(Auth::check()){
            // $user = User::find($request->user()->id);
            return redirect()->intended(route('home'));
        }
        //dd($request);
        return $next($request);
    }
}
