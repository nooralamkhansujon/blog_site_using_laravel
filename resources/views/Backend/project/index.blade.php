@extends('backend.app')
@section('header_title','Project List')
@section('content')
    <div class="row">
         <div class="col-md-12">
               <table class="table table-hover table-responsive-md ">
                 <tr class="bg-success text-light">
                     <th>Sr No</th>
                     <th>Project Url</th>
                     <th>Project Title</th>
                     <th>Project description</th>
                     <th>Date</th>
                     <th>Image</th>
                     <th>Action</th>
                 </tr>
                 @foreach($projects as $project)
                 <tr>
                     <td>{{$project->id}}</td>
                     <td>{{$project->project_title}}</td>
                     <td>{{$project->project_url}}</td>
                     <td>{{$project->project_description}}</td>
                    <td>{{$project->created_at->format('j M ,Y')}}</td>
                    <td>
                        <img src="{{asset('storage/'.$project->project_image)}}"
                         alt="" width="50px" height="50px" />
                      </td>

                    @if($project->trashed())
                        <td>
                            <a href="{{route('adminproject.restore',$project->id)}}" class="btn btn-success btn-sm">restore</a>
                                ||
                            <a href="{{route('adminproject.force_delete',$project->id)}}" data-id="{{$project->id}}"
                                class="btn btn-danger btn-sm project_force_delete">Delete</a>
                            <form action="{{route('adminproject.force_delete',$project->id)}}"
                                id="project_force_delete_{{$project->id}}_form" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @else
                        <td>
                            <a href="{{route('adminproject.edit',$project->id)}}" class="btn btn-success btn-sm">Edit</a>
                                ||
                            <a href="{{route('adminproject.destroy',$project->id)}}" data-id="{{$project->id}}"
                                class="btn btn-danger btn-sm project_delete">Trashed</a>
                            <form action="{{route('adminproject.destroy',$project->id)}}" id="project_delete_{{$project->id}}_form" method="POST">
                                    @csrf
                                    @method('DELETE')
                            </form>
                        </td>
                    @endif
                 </tr>
                @endforeach
              </table>
         </div>
    </div>

    <script type="text/javascript">
            $(".project_delete").on('click',function(event){
                event.preventDefault();
                id     = this.dataset.id;
                form   = $(`#project_delete_${id}_form`);

                if(confirm("Are you sure! You want to Trashed this post")){
                     form.submit();
                }
            });

            $('.project_force_delete').on('click',function(event){
                  event.preventDefault();
                  id     = this.dataset.id;
                  form   = $(`#project_force_delete_${id}_form`);
                  console.log(form);

                  if(confirm('Are you sure! you want to Delete This Post'))
                  {
                      form.submit()
                  }
            });
    </script>
@endsection
