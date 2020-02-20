<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('admin_css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"  />

    <style >
        body{
            background: linear-gradient(to right , rgba(233, 85, 58,0.9), rgb(255, 99, 71,0.9));
        }
       #app{
           position: relative;
           top:30%;
           left:30%;
           margin-top:200px;
           /* transform: translateX(-50%,-50%); */
           background: linear-gradient(to right , rgba(23, 85, 58,0.9), rgb(25, 92, 71,0.5));
           width:500px;
           height:auto;
           padding:1rem;
           color:#fff;
       }
       .form-group label{
           font-size:20px;
       }
    </style>

</head>
<body>
    <div id="app">
       <form action="{{route('admin.login.submit')}}" method="POST">
             @csrf
             <div>
                 <h2 class="text-success">Admin Login</h2>
             </div>
            <div class="form-group">
                <label for="email"> Email</label>
                <input type="text" id="email" class="form-control" name='email' placeholder="Enter Your Email">
                @if($errors->has('email'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
               @endif
            </div>
            <div class="form-group">
                <label for="password" class="section_label"> Password</label>
                <input type="password" class="form-control"
                id="password" name="password" placeholder="Enter Your Password" >
                @if($errors->has('password'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group ml-3">
                <input class="form-check-input" type="checkbox" name="remember"
                id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="section_label" for="remember">
                {{ __('Remember Me') }}
                </label>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-success" name="login" value="Login" >
                    <p class="ml-3 mt-3">Need An Account? <a href="{{route('register')}}">Register</a></p>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
</body>
</html>
