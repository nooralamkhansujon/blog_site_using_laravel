<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminLoginController extends Controller
{


    public function __construct()
    {
         $this->middleware('guest:logout')->except('adminlogout');
    }

    public function adminShowLoginForm(){
        return view('backend.login');
    }

    public function adminLogin(Request $request){
        //find user user using email id
        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ]);

        //define error flag
        //  errorflag     = 1 means admin
        //  errorflag   = 2 means  user  and
        //  errorflag   = 3 means you are guest
        $errorflag = false;
        //check login user email exist in database or not
        $user = User::where('email',$request->email)->get();
        // check if the user is exist or not
        if(count($user) >  0){
            $user = User::where('email',$request->email)->get()[0];
            // if user is admin then
            if(strtolower($user->rule->name) == 'admin'){
                $data = array(
                    'email'    => $request->email,
                    'password' => $request->password
                );
                // log the admin user in
                if(Auth::attempt($data,$request->remember)){
                        $this->setSuccess("You are login successfully in Admin!");
                        return redirect()->route('dashboard');
                }
                //if  you login failed then
                else{
                   $errorflag =1;
                }
            }
            // if user is not admin then
            else{
                 $errorflag =2;
            }
        }
        //if login user is guest
        else{
            $errorflag = 3;
        }

        if($errorflag == 1){
            $this->setError("Your password or email address is not correct !");
            return redirect()->route('admin.login');
        }
        if($errorflag == 2){
            $this->setError("Your are not admin!");
            return redirect()->route('admin.login');
        }
        if($errorflag == 3){
            $this->setError("Your are not a user!");
            return redirect()->route('admin.login');
        }

    }

    public function adminlogout(){
         Auth::logout();
         return redirect()->route('admin.login');
    }

}
