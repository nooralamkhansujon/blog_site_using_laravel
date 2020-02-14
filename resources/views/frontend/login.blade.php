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
            <div class="section_body">
                 <h2 class="text-success">Please Login For Subscribe</h2>
               <form action="">
                   <div class="input_section">
                      <label for="">
                          Name
                       </label>
                       <input type="text" name="name" placeholder="Enter Your Name">
                   </div>
                   <div class="input_section">
                       <label for="name" class="section_label">
                           Email
                        </label>
                        <input type="text" id="name" name="name" placeholder="Enter Your Name">
                    </div>
                    <div class="input_section">
                       <label for="" class="section_label">
                           Password
                        </label>
                        <input type="password" name="password" placeholder="Enter Your Password" >
                    </div>
                    <div class="input_section">
                       <label for="" class="section_label">
                          confirm Password
                        </label>
                        <input type="password" name="confirm_password" placeholder="Enter Your Password" >
                    </div>
                    <div class=input_section>
                        <input type="submit" class="btn btn-success" name="submit" value="submit" >
                    </div>
                    <div>
               </form>
            </div>
        </div>
    </section>

</body>
</html>
