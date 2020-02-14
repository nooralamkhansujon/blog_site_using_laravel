<!DOCTYPE html>
<html lang="en">
  <head>
    <title>shibbirit.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">


	<link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png" />
	<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />


    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('myjs/jquery-3.2.1.min.js')}}"></script>
    <style>
        .custom_alert{
            position:relative;
            top:80px;
            z-index:10000;
        }
        .inner_alert{
            position:absolute;
            width:100%;
            height:80px;
            display:flex;
            justify-content: center;
        }

    </style>
  </head>



  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

     {{-- custom alert message  --}}
     <div class="custom_alert">
            @if(session()->has('message'))
            <div class="inner_alert alert alert-{{session()->get('type')}} alert-dismissible fade show">
                    <p>{{ session()->get('message') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
     </div>
       {{-- end of custom alert message  --}}


    {{-- start of nav section  --}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	      <a class="navbar-brand text-success" href="index.html">SHIBBIR-IT</a>
          <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
              <li class="nav-item"><a href="{{route('home')}}" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="{{route('portfolio')}}" class="nav-link"><span>Protfolio</span></a></li>
	          <li class="nav-item"><a href="{{route('project')}}" class="nav-link"><span>Project</span></a></li>
	          <li class="nav-item"><a href="{{route('about')}}" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="{{route('blog')}}" class="nav-link"><span>Blog</span></a></li>
              <li class="nav-item"><a href="{{route('contact')}}" class="nav-link"><span>Contact</span></a></li>
              @if(!auth()->check())
                    <li class="nav-item">
                         <a href="{{route('login')}}" class="nav-link"><span>Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">
                            <span>Register</span>
                        </a>
                    </li>
               @else
                    <li class="nav-item">
                        <a href="{{route('logout')}}" id="logout" class="nav-link">
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
               @endif
              <li class="nav-item cta ">
                    <a href="#" class="nav-link">Subscribe Us</a>

              </li>
	       </ul>
	    </div>
    </nav>


<script type="text/javascript">
    let logout = document.getElementById('logout');
    logout.addEventListener('click',function(event){
            event.preventDefault();
            let logout_form = document.getElementById('logout-form');
            logout_form.submit();
    });
</script>
