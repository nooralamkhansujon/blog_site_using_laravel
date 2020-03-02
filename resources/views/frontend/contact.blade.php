@extends('frontend.app')

@section('counter')
    @include('frontend.partials.counter')
@endsection


@section('content')
<section class="ftco-section contact-section ftco-no-pb bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-10 heading-section text-center ftco-animate">
          <span class="subheading">Contact</span>
          <h2 class="mb-4">Contact ME</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row d-flex contact-info mb-5">
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-map-signs"></span>
                </div>
                <h3 class="mb-4">Address</h3>
              <p>Dhaka,Bangladesh</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-phone2"></span>
                </div>
                <h3 class="mb-4">Contact Number</h3>
              <p><a href="tel://1234567920">+ 88 017 3748 1778</a></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-paper-plane"></span>
                </div>
                <h3 class="mb-4">Email Address</h3>
              <p><a href="info@shibbiritgmail.com">info@shibbiritgmail.com</a></p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
            <div class="align-self-stretch box p-4 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="icon-globe"></span>
                </div>
                <h3 class="mb-4">Website</h3>
              <p><a href="#">www.shibbirit.com</a></p>
            </div>
        </div>
      </div>


      <div class="row no-gutters block-9">
        <div class="col-md-6 order-md-last d-flex">

        <form action="{{route('contact.submit')}}" method="POST" class="bg-primary p-5 contact-form">
            @csrf
            <div class="form-group">
              <input type="text" name="name"  class="form-control"
              placeholder="Enter your name" />
              @if($errors->has('name'))
                <span class="text-warning d-block">{{$errors->first('name')}}</span>
              @endif
            </div>

            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Enter Your Email" />
              @if($errors->has('email'))
                 <span class="text-warning d-block">{{$errors->first('email')}}</span>
              @endif
            </div>

            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="Subject">
              @if($errors->has('subject'))
                    <span class="text-warning d-block">{{$errors->first('subject')}}</span>
              @endif
            </div>

            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              @if($errors->has('message'))
                  <span class="text-warning d-block">{{$errors->first('message')}}</span>
              @endif
            </div>

            <div class="form-group">
                 <input type="submit" value="Send Message" class="btn btn-darken py-3 px-5">
            </div>
          </form>

        </div>

        <div class="col-md-6 d-flex">
            <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
