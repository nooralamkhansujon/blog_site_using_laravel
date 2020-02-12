@extends('frontend.app')

@section('counter')
     @include('frontend.partials.counter')
@endsection

@section('content')

<section class="ftco-section" id="blog-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Blog</span>
          <h2 class="mb-4">My Blog</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
                <div class="text">
                    <h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
                </div>
            <a href="single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                      <a href="#" class="mr-2">Admin</a>
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
                <div class="text">
                    <h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
                </div>
            <a href="single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                      <a href="#" class="mr-2">Admin</a>
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry">
                <div class="text">
                    <h3 class="heading"><a href="single.html">All you want to know about industrial laws</a></h3>
                </div>
            <a href="single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text mt-3 float-right d-block">
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                      <a href="#" class="mr-2">Admin</a>
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
