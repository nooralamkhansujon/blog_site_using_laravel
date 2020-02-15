@extends('backend.app')
@yield('header_title','Blog List')
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
                 </tr>
                 @foreach($blogs as $blog)
                 <tr>
                     <td>{{$blog->id}}</td>
                     <td>{{$blog->title}}</td>
                     <td>{{$blog->description}}</td>
                    <td>
                      <img src="{{asset('storage/'.$blog->image)}}"
                       alt="" width="50px" height="50px" />
                    </td>
                    <td>{{$blog->author}}</td>
                 </tr>
                @endforeach
              </table>
         </div>
    </div>
@endsection
