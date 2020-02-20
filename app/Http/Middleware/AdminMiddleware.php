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

        if(Auth::check()){
            //
            $user = User::find($request->user()->id);
            dd($user);
            if(strtolower($user->Rule->name) == "admin"){
                return redirect()->intended(route('dashboard'));
            }
            else{
                return redirect()->intended(route('admin.login'));
            }
        }
        return $next($request);
    }


}
