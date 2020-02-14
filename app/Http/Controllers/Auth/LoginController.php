<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        //validate the data
        $request->validate([
                $this->username()  => 'required|string',
                'password'         => 'required|string',
        ]);

        //log the user in
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];
        if(auth()->attempt($data,$request->remember)){
            $this->setSuccess("You are login successfully!");
            return redirect()->route('home');
        }
        else{
            $this->setSuccess('Error! Something is wrong Please Try again');
            return back()->route('login');
        }


       // if login success then redirect to the intended page

       //else redirect with error page
    }

    public function showLoginForm(){
        return view('frontend.login');
    }


}
