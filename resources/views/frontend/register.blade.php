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
            <div class="section_body">
                 <h2 class="text-success ">Please Login For Subscribe</h2>
               <form id="register_form" action="{{asset('register')}}" method="POST">
                    @csrf
                   <div class="input_section">
                      <label for="register_name">Name</label>
                       <input type="text" id="register_name" name="name" placeholder="Enter Your Name">
                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                   </div>
                   <div class="input_section">
                       <label for="register_email">
                           Email
                        </label>
                        <input type="text" id="register_email" name="email" placeholder="Enter Your Email">
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_section">
                       <label for="register_password">Password</label>
                        <input type="password" name="password" placeholder="Enter Your Password" >
                        @if($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
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
                        <input type="submit" class="btn btn-success" name="register" value="Register" >
                    </div>
                    <div>
               </form>
            </div>
        </div>
    </section>

</body>
</html>


