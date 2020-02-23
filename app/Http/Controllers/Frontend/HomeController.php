<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Blog;

class HomeController extends Controller
{

    public function index(){
       return  view('frontend.home');
    }

    public function about(){
        return view('frontend.about');
    }

    public function blog(){
         $blogs = Blog::orderBy('id','desc')->limit(3)->get();
         return view('frontend.blog',compact('blogs'));
    }

    public function blogDetails(Blog $blog){

        return view('frontend.blog_details',compact('blog'));
    }

    public function contact(){
        return view('frontend.contact');
    }
    public function portfolio(){
       return view('frontend.portfolio');
    }

    public function project(){
        $projects = Project::all();
        return view('frontend.project',compact('projects'));
    }

    public function project_details(Project $project){
        return view('frontend.project_details',compact('project'));
    }
}
