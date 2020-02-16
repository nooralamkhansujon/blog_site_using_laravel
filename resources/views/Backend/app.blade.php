@include('backend.partials.header')

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Shibbir IT</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
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
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
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

@yield('scripts')
