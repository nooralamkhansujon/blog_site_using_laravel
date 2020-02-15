<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.blog.index');
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
             'title'      =>'required|max:150|string',
             'slug'       =>'required',
             'author'     =>'required|max:80',
             'description'=>'required',
             'image'      =>'required|mimes:jpeg,png,jpg|image'
       ]);
       $data = array(
        'title'=>$request->title,
        'slug'=>$request->slug,
        'author'=>$request->author,
        'description'=>$request->description,
       );
       //blog image
    //    $image           = $request->image->getClientOriginalName();
    //    $image_extension =        $request->image->getClientOriginalExtension();
    //    $new_image       = "blog_".uniqid().$image_extension;

    //    $path = $request->file('image')->storeAs(
    //              'blog/'.$new_image,'public');;


       //insert data into blog
       $blog = Blog::create($data);
       if($blog){
             $this->setSuccess('New Blog has been addded Successfully!');
             return redirect()->route('blog.index');
       }
       $this->setSuccess('New Blog has been addded Successfully!');
       return back()->withInput($request->all());

    }

    private function  thumbnail($request,$file_prefix,$folder){
           $image           = $request->getClientOriginalName();
           $image_extension = $request->getClientOriginalExtension();
           $new_image       = $file_prefix.uniqid().$image_extension;

           $request->file('image')->storeAs($folder.'/'.$new_image,'public');;
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
    public function edit($id)
    {
        //
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
        //
    }
}
