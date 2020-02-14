<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
            <div class="section_body">
                 <h2 class="text-success ">Register Form</h2>
               <form id="register_form" action="{{route('register')}}" method="POST">
                    @csrf
                   <div class="input_section">
                      <label for="register_name">Name</label>
                       <input type="text" id="register_name" name="name" placeholder="Enter Your Name">
                        @if($errors->has('name'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                   </div>
                   <div class="input_section">
                       <label for="register_email">Email</label>
                        <input type="text" id="register_email" name="email" placeholder="Enter Your Email">
                        @if($errors->has('email'))
                            <span class="text-danger"  role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_section">
                       <label for="register_password">Password</label>
                        <input type="password" name="password" placeholder="Enter Your Password" >
                        @if($errors->has('password'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_section">
                       <label for="reg_conf">confirm Password</label>
                        <input type="password" id="reg_conf" name="password_confirmation"
                        placeholder="Enter Your Password" >
                    </div>
                    <div class=input_section>
                        <div class="input_body d-flex justify-content-center">
                            <input type="submit" class="btn btn-success" name="register" value="Register" >
                            <p class="ml-3 mt-3">Already Have An Account? <a href="{{route('login')}}">Login</a></p>
                     </div>
                    </div>
                    <div>
               </form>
            </div>
        </div>
    </section>

</body>
</html>


