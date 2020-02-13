 @include('frontend.partials.header')
 @yield('counter')

 @yield('content')

 @include('frontend.partials.footer')



 <style>
    .custom_alert{
      position:absolute;
      top:0;
      right:0px;
      z-index:10000;
      width:330px;
      transform:translateX(1500px);
      transition:transform 1s ease;
    }

</style>

  <div class="custom_alert">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class='message'>You should check in on some of those fields below.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
  </div>



