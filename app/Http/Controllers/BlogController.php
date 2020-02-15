<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $blogs = Blog::all();
       return view('backend.blog.index',compact('blogs'));
    }

    public function trashed(){
        $blogs = Blog::onlyTrashed()->get();
        return view('backend.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
       $this->validate($request,[
             'title'      =>'required|max:150|string|unique:blogs,title',
             'slug'       =>'required|max:150|string|unique:blogs,slug',
             'author'     =>'required|max:80',
             'description'=>'required',
             'image'      =>'required|mimes:jpeg,png,jpg|image'
       ]);
        $image = $this->thumbnail($request->file('image'),'blog','blog',300,300);
        $data = array(
            'title'=>$request->title,
            'slug'=>$request->slug,
            'author'=>$request->author,
            'description'=>$request->description,
            'image'  =>$image
        );

        //insert data into blog
        $blog = Blog::create($data);
        if($blog){
                $this->setSuccess('New Blog has been addded Successfully!');
                return redirect()->route('blogpost.index');
        }
        $this->setError('Error!Something is wrong.');
        return back()->withInput($request->all());

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        dd($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //your blog will be trashed
         $blog    = Blog::find($id);
        if($blog->delete()){
            $this->setSuccess('Your Blog has been trashed successfully');
            return redirect()->route('blog.trashed');
        }
        $this->setError('Something is worng! Please Try Again!');
        return back();
    }

    public function force_delete(Blog $blog)
    {

          if($blog->forceDelete())
          {
            $this->setSuccess('Your Blog has been trashed successfully');
            return redirect(route('blog.trashed'));
          }
          $this->setError('Something is wrong! please try again!');
          return back();
    }
}
