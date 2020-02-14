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
      /* display:none; */
    }

</style>
  {{-- custom alert message  --}}
  <div class="custom_alert">
    @if(session()->has('message'))
        <div class="alert alert-{{session()->get('type')}} alert-dismissible fade show" role="alert">
                <p>{{ session()->get('message') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p id='message'></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  </div>



