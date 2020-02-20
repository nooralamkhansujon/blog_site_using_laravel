<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{


    public function __construct()
    {
         $this->middleware('guest')->except('adminlogout');
    }

    public function adminShowLoginForm(){
        return view('backend.login');
    }

    public function adminLogin(Request $request){

    }

    public function adminlogout(){
         Auth::logout();
         return redirect()->route('admin.login');
    }

}
