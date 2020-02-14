<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request,[
             $this->username()  => 'required|string',
             'password'          => 'required|string',
        ]);
        //log the user in
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];
        //Attempt to log the user in
        if(Auth::attempt($data,$request->remember)){
            //if successful, then redirect to their intended location
            $this->setSuccess("You are login successfully!");
            return redirect()->intended(route('home'));
        }
         //if unsuccessfull then redirect back to the login with  the form data
         $this->setError('Error! Something is wrong Please Try again');
         return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function showLoginForm(){
        return view('frontend.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }

}
