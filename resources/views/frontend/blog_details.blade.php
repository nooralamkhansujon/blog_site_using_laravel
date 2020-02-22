@extends('frontend.app')

@section('counter')
         @include('frontend.partials.counter')
 @endsection

@section('content')
    <section class="ftco-section">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
               <h2 class="text-success">Blog Datails</h2>
           </div>
          <div class="col-lg-8 ftco-animate">
             <img style="width:100%;" src="{{asset('storage/'.$blog->image)}}" alt="{{$blog->title}}" class="img-fluid">
             <h2 class="mb-3 mt-5 text-success">{{$blog->title}}</h2>
             <p class="lead">{{$blog->description}}</p>


            <div class="pt-5 mt-5">
              <h3 class="mb-5">6 Comments</h3>

               @include('frontend.partials.comment_list')

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- .col-md-8 -->
         @include('frontend.partials.details_sidebar')

        </div>
      </div>
    </section> <!-- .section -->


@endsection
