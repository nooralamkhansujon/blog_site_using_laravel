<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login_register.css')}}" />
</head>
<body>
    <section id="register_section">
        <div class="container">
            <div class="col-md-6 ml-5 offset-2">
                @if(session()->has('message'))
                   <div class="container" style="margin-left:14.3rem;">
                        <div class="alert alert-{{session()->get('type')}}">
                             {{session()->get('message')}}
                        </div>
                   </div>
                @endif
            </div>
            {{-- <div class="col-md-6 ml-5 offset-2">
                  <div class="container" style="margin-left:14.3rem;">
                    <div class="alert alert-danger">
                        This is my alert message
                     </div>
                  </div>
            </div> --}}
            <div class="section_body">

                <h2 class="text-success">Please Login For Subscribe</h2>
                 <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input_section">
                            <label for="login_name">Name</label>
                            <input type="text" id="login_name" name="name" placeholder="Enter Your Name">
                        </div>
                       <div class="input_section">
                            <label for="login_email" class="section_label">Email</label>
                            <input type="text" id="login_email" name='email' placeholder="Enter Your Email">
                        </div>
                        <div class="input_section">
                            <label for="login_password" class="section_label"> Password</label>
                            <input type="password" id="login_password" name="password" placeholder="Enter Your Password" >
                        </div>
                        <div class="input_section ml-3">
                            <input class="form-check-input" type="checkbox" name="remember"
                            id="login_remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="section_label" for="remember">
                            {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class=input_section>
                            <div class="input_body d-flex justify-content-center">
                                <input type="submit" class="btn btn-success" name="login" value="Login" >
                                <p class="ml-3 mt-3">Need An Account? <a href="{{route('register')}}">Register</a></p>
                            </div>
                        </div>
                <div>
             </form>
            </div>
        </div>
    </section>

</body>
</html>
