<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminMiddleware
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
        //if user is login
        if(Auth::check()){
            $user = User::find($request->user()->id);
            if(strtolower($user->Rule->name) !=  "admin"){
                return redirect()->intended(route('admin.login'));
            }
        }
        // if user is not login
        else{
            return redirect()->intended(route('admin.login'));
        }

        // otherwise go to user intended location
        return $next($request);
    }


}
