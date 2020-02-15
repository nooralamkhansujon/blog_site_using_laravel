@extends('backend.app')
@section('header_title','Add Blog')
@section('content')
    <div class="row">
         <div class="col-md-12">
                <form action="{{route("blogpost.store")}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <label for="title" class="form-input-label">Title *</label>
                           <input type="text" name="title" id="title" class="form-control" />
                           <small>{{env('APP_URL','Nooralamkhan.com')}} <span id="slug"></span></small>
                           <input style="display:none" type="text" id="slug_id" name="slug" />
                           @if($errors->has('title'))
                              <span class="text-danger d-block">{{$errors->first('title')}}</span>
                           @endif
                       </div>
                       <div class="form-group">
                        <label for="author" class="form-input-label">Author Name*</label>
                        <input type="text" name="author" class="form-control" />
                        @if($errors->has('author'))
                           <span class="text-danger d-block">{{$errors->first('author')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-input-label">Description*</label>
                       <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                        @if($errors->has('title'))
                            <span class="text-danger d-block">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-input-label">Image*</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if($errors->has('image'))
                            <span class="text-danger d-block">{{$errors->first('image')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" name="sumbit" value="Add Blog" class="btn btn-success">
                    </div>
                </form>
         </div>
    </div>
@endsection

@section('scripts')
   <script type="text/javascript">
          $('#title').on('keyup',function(event){
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
