<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('backend.project.index',compact('projects'));
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->get();
        return view('backend.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->customValidate($request);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        //create thumnail
        $image = $this->thumbnail($request->file('project_image'),'project','project',600,600);
        $data  = $this->projectData($request,$image); //it will return blog data

        //insert data into Project
        $project = Project::create($data);
        if($project){
            $this->setSuccess('New Project has been added Successfully!');
            return redirect()->route('adminproject.index');
        }
        $this->setError('Error!Something is wrong.');
        return back()->withInput();
    }

    private function projectData($data,$image){

        $data = array(
            'project_title'       =>   $data['project_title'],
            'slug'                =>   $data['slug'],
            'project_url'         =>   $data['project_url'],
            'project_description' =>   $data['project_description'],
            'project_image'       =>   $image
        );
        return $data;
    }

    private function customValidate($request,$id=null)
    {
        $validator = '';

        if($id == null)
        {
            $validator = Validator::make($request->all(), [
                'project_title'       => ['required','max:150','string'],
                'project_url'         => ['required','max:150','url','unique:projects,project_url'],
                'project_description' => 'required',
                'project_image'       => 'required|mimes:jpeg,png,jpg|image'
            ]);
        }
        else{

            $validator = Validator::make($request->all(), [
                'project_title'       => ['required','max:150','string', Rule::unique('projects')->ignore($id)],
                'project_url'         => ['required','max:150','url', Rule::unique('projects')->ignore($id)],
                'project_description' => 'required',
                'project_image'       => 'required|mimes:jpeg,png,jpg|image'
            ]);
        }

        return $validator;
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project  = Project::find($id);
        return view('backend.project.create',compact('project'));
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

        ///validate the data
        $validator = $this->customValidate($request,$id);

        // if validator fails then
        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $project   =  Project::find($id);
        $image     =  $project->project_image;

        if(isset($request->project_image))
        {
            // create thumbnail and return blog/filename
            $image = $this->thumbnail($request->file('project_image'),'project','project',600,600);
        }
        $data      = $this->projectData($request,$image);
        $project   = Project::create($data);

        // if project is added then
        if($project){
            $this->setSuccess('Project has been Update Successfully!');
            return redirect()->route('adminproject.index');
        }

        // else show error
        $this->setError('Error! Something is Wrong.');
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $project    = Project::find($id);

        //your project will be trashed
        if($project->delete()){
            $this->setSuccess('Your Project has been trashed successfully');
            return redirect()->route('adminproject.trashed');
        }
        $this->setError('Something is worng! Please Try Again!');
        return back();
    }

    public function force_delete($id)
    {
        $project = Project::onlyTrashed($id)->where('id',$id)->get()[0];

        //if your project is force_delete
        if($project->forceDelete())
        {
            $this->setSuccess('Your Project has been Deleted successfully');
            return redirect()->route('adminproject.trashed');
        }
        $this->setError('Something is wrong! please try again!');
        return back();
    }

    public function restore($id)
    {
        $project = Project::onlyTrashed()->where('id',$id)->get()[0];


        if($project->restore())
        {
            $this->setSuccess('Your Project has been restore successfully');
            return redirect()->route('adminproject.index');
        }
        $this->setError('Something is wrong! please try again');
        return back();

    }
}
