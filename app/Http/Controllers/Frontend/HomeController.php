<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){
       return  view('frontend.home');
    }

    public function about(){
        return view('frontend.about');
    }

    public function blog(){
         return view('frontend.blog');
    }

    public function contact(){
        return view('frontend.contact');
    }
    public function portfolio(){
       return view('frontend.portfolio');
    }

    public function project(){
        return view('frontend.project');
    }
}
