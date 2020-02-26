<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Blog;
use App\Comment;
use App\Reply;

class HomeController extends Controller
{

    public function index(){
       return  view('frontend.home');
    }

    public function about(){
        return view('frontend.about');
    }

    public function blog(){
         $blogs = Blog::paginate(3);
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

    public function comment(Request $request){

          if($request->commentable_type == 'blog'){

                $comment = Comment::create([
                        'commentable_id'   => $request->commentable_id,
                        'commentable_type' => 'App\Blog',
                        'comment'          => $request->comment,
                        'name'             => $request->name,
                        'email'            => $request->email
                    ]);
                if($comment){
                    echo "Ok";
                }
          }
          elseif($request->commentable_type == 'project'){

                $comment = Comment::create([
                    'commentable_id'   => $request->commentable_id,
                    'commentable_type' => 'App\Project',
                    'comment'          => $request->comment,
                    'name'             => $request->name,
                    'email'            => $request->email
                ]);
                if($comment){
                    echo "Ok";
                }

          }
    }

    public function reply(Request $request)
    {
        // echo json_encode($request->all());
        $reply             = new Reply();
        $reply->parent_id  = $request->parent_id;
        $reply->comment_id = $request->comment_id;
        $reply->reply      = $request->textdata;
        if($reply->save())
        {
            echo "Ok";
        }
        else{
            echo "Something error";
        }

    }

}

