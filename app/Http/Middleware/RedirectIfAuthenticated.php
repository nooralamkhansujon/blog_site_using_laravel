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

        if($guard == 'logout'){
            return $next($request);
        }
        elseif(Auth::check()){

            $user = User::find($request->user()->id);

            if(strtolower($user->role->name) == 'admin'){
                return redirect()->route('dashboard');
            }
            elseif(strtolower($user->role->name) == 'user')
            {
                return redirect()->route('home');
            }
        }
        //dd($request);
        return $next($request);
    }
}
