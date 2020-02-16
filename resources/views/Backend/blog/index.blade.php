@extends('backend.app')
@section('header_title','Blog List')
@section('content')
    <div class="row">
         <div class="col-md-12">
               <table class="table table-hover table-responsive-md ">
                 <tr class="bg-success text-light">
                     <th>Sr No</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>author</th>
                     <th>Action</th>
                 </tr>
                 @foreach($blogs as $blog)
                 <tr>
                     <td>{{$blog->id}}</td>
                     <td>{{$blog->title}}</td>
                     <td>{{substr($blog->description,0,50)."..."}}</td>
                    <td>
                      <img src="{{asset('storage/'.$blog->image)}}"
                       alt="" width="50px" height="50px" />
                    </td>
                    <td>{{$blog->author}}</td>

                    @if($blog->trashed())
                        <td>
                            <a href="{{route('blog.restore',$blog->id)}}" class="btn btn-success btn-sm">restore</a>
                                ||
                            <a href="{{route('blogpost.destroy',$blog->id)}}" data-id="{{$blog->id}}"
                                class="btn btn-danger btn-sm blog_force_delete">Delete</a>
                            <form action="{{route('blog.force_delete',$blog->id)}}" id="blog_force_delete_{{$blog->id}}_form" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @else
                        <td>
                            <a href="{{route('blogpost.edit',$blog->id)}}" class="btn btn-success btn-sm">Edit</a>
                                ||
                            <a href="{{route('blogpost.destroy',$blog->id)}}" data-id="{{$blog->id}}"
                                class="btn btn-danger btn-sm blog_delete">Trashed</a>
                            <form action="{{route('blogpost.destroy',$blog->id)}}" id="blog_delete_{{$blog->id}}_form" method="POST">
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
            $(".blog_delete").on('click',function(event){
                event.preventDefault();
                id     = this.dataset.id;
                form   = $(`#blog_delete_${id}_form`);
                console.log(id);
                if(confirm("Are you sure! You want to Trashed this post")){
                     form.submit();
                }
            });

            $('.blog_force_delete').on('click',function(event){
                  event.preventDefault();
                  id     = this.dataset.id;
                  form   = $(`#blog_delete_${id}_form`);

                  if(confirm('Are you sure! you want to Delete This Post'))
                  {
                      form.submit()
                  }
            });
    </script>
@endsection
