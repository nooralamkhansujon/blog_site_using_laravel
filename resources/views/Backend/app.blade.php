@include('backend.partials.header')

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-3" href="#">Shibbir IT</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" id="logout_admin" href="{{route('admin.logout.submit')}}">Sign out</a>

                <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
   </nav>

<div class="container-fluid">
  <div class="row">
        @include('backend.partials.side_nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('header_title')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @yield('add_button')
                </div>
            </div>
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('message'))
                           <div class="alert alert-{{session()->get('type')}}">
                                {{session()->get('message')}}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                 <ul>
                                     @foreach($errors->all() as $error)
                                         <li>{{$error}}</li>
                                     @endforeach
                                 </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                      @yield('content')
                    </div>
                </div>
           </div>
        </main>
  </div>
</div>
@include('backend.partials.footer')

<script type="text/javascript">

     $("#logout_admin").on('click',function(event){
            event.preventDefault();

            if(confirm('Are you sure! You want to logout from the page'))
            {
                $('#logout-form').submit();
            }

     });
</script>

@yield('scripts')
