<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    //admin route function
    public function index()
    {
       $blogs = Blog::all();
       return view('backend.blog.index',compact('blogs'));
    }

    public function trashed(){
        $blogs = Blog::onlyTrashed()->get();
        return view('backend.blog.index',compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog.create');
    }
    private function customValidate($request,$id=null){

        $validator = '';

        if($id == null)
        {
            $validator = Validator::make($request->all(), [
                'title'      => 'required|max:150|string|unique:blogs,title',
                'slug'       => 'required|max:150|string|unique:blogs,slug',
                'author'     => 'required|max:80',
                'description'=> 'required',
                'image'      => 'required|mimes:jpeg,png,jpg|image'
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'title'      => ['required','max:150','string', Rule::unique('blogs')->ignore($id)],
                'slug'       => 'required|max:150|string|unique:blogs,slug',
                'author'     => 'required|max:80',
                'description'=> 'required',
                'image'      => 'required|mimes:jpeg,png,jpg|image'
            ]);
        }

        return $validator;
    }

    private function Blogdata(Request $request,$image)
    {
        $data = array(
            'title'      => $request->title,
            'slug'       => $request->slug,
            'author'     => $request->author,
            'description'=> $request->description,
            'image'      => $image
        );
      return $data;
    }
    public function store(Request $request)
    {
        //validate the request
        $validator   = $this->customValidate($request);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        // create thumbnail
        $image = $this->thumbnail($request->file('image'),'blog','blog',300,300);

        $data = $this->Blogdata($request,$image); //it will return blog data

        //insert data into blog
        $blog = Blog::create($data);
        if($blog){
            $this->setSuccess('New Blog has been added Successfully!');
            return redirect()->route('blogpost.index');
        }
        $this->setError('Error!Something is wrong.');
        return back()->withInput();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('backend.blog.create',compact('blog'));
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
    public function update(Request $request, $id)
    {
        //validate the request
        $this->customValidate($request,$id);
        //get the value from the database
        $blog     = Blog::find($id);
        $image    = $blog->image ;
        if(isset($request->image))
        {
            // create thumbnail and return blog/filename
            $image = $this->thumbnail($request->file('image'),'blog','blog',300,300);
        }
        $data              = $this->Blogdata($request,$image);//this function will return array of request data
        //update blog data
        $blog->title       = $data['title'];
        $blog->slug        = $data['slug'];
        $blog->author      = $data['author'];
        $blog->description = $data['description'];
        $blog->image       = $data['image'];

        if($blog->save()){
             $this->setSuccess("Blog has been Updated success");
             return redirect()->route('blogpost.index');
        }
        $this->setError('Error! Blog is not Updated!');
        return back();


    }
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

    public function force_delete($id)
    {
        $blog = Blog::onlyTrashed($id)->where('id',$id)->get()[0];

        if($blog->forceDelete())
        {
            $this->setSuccess('Your Blog has been Deleted successfully');
            return redirect()->route('blog.trashed');
        }
        $this->setError('Something is wrong! please try again!');
        return back();
    }

    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->where('id',$id)->get()[0];

        if($blog->restore())
        {
            $this->setSuccess('Your Blog has been restore successfully');
            return redirect()->route('blogpost.index');
        }
        $this->setError('Something is wrong! please try again');
        return back();
    }
    // end of admin route section
}
