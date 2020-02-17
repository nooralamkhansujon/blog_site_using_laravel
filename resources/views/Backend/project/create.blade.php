@extends('backend.app')
@section('header_title','Add Project')

@section('content')
    <div class="row">
         <div class="col-md-12">
                <form action="{{isset($project)?route("adminproject.update",$project->id):route("adminproject.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($project))
                         @method('PUT')
                     @endif

                    <div class="form-group">
                        <label for="project_title" class="form-input-label">Project Title *</label>
                        <input type="text" name="project_title"
                           id="project_title" class="form-control"
                           value="{{@$project->project_title}}"/>
                        <small>
                             {{env('APP_URL','Nooralamkhan.com')}}
                            <span id="slug">{{@$project->slug}}</span>
                        </small>
                        <input style="display:none" type="text" id="slug_id" name="slug" value="{{@$project->slug}}" />
                        @if($errors->has('project_title'))
                            <span class="text-danger d-block">{{$errors->first('project_title')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="project_url" class="form-input-label">Project Url *</label>
                        <input type="text" name="project_url"
                           id="project_url" class="form-control"
                           value="{{@$project->project_url}}"/>
                        @if($errors->has('project_url'))
                            <span class="text-danger d-block">
                                {{$errors->first('project_url')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="project_description" class="form-input-label">
                            Project Description*
                        </label>
                        <textarea name="project_description" class="form-control" id="project_description"  cols="30" rows="5">
                            {{@$project->project_description}}
                       </textarea>

                        @if($errors->has('project_description'))
                           <span class="text-danger d-block">{{$errors->first('project_description')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        @if(isset($project))
                            <div>
                                <img src="{{asset('storage/'.$project->project_image)}}" width="50px" height="50px"
                                alt="{{@$project->project_title}}">
                            </div>
                        @endif
                        <label for="project_image" class="form-input-label">Project Image* </label>
                        <input type="file" name="project_image" id="project_image" class="form-control" />
                        @if($errors->has('project_image'))
                            <span class="text-danger d-block">{{$errors->first('project_image')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        @if(isset($project))
                            <input type="submit" name="sumbit" value="Edit Project" class="btn btn-success">
                        @else
                            <input type="submit" name="sumbit" value="Add Project" class="btn btn-success">
                        @endif

                    </div>
                </form>
         </div>
    </div>
@endsection

@section('scripts')
   <script type="text/javascript">
          $('#project_title').on('keyup',function(event){
              event.preventDefault();
              title = slugify(this.value);
              $('#slug').html(title);
              $('#slug_id').val(title);
              console.log(title);
          });

        function slugify(text)
        {
              return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        }
    </script>
@endsection
