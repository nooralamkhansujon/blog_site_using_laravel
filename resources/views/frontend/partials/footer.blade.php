

    <footer class="ftco-footer ftco-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">About <span>shibbir-it</span></h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-4">
                <h2 class="ftco-heading-2">Links</h2>
                <ul class="list-unstyled">
                  <li><a href="{{route('home')}}"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                  <li><a href="{{route('about')}}"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                  <li><a href="{{route('blog')}}"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                  <li><a href="{{route('contact')}}"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                  <li><a href="{{route('project')}}"><span class="icon-long-arrow-right mr-2"></span>Project</a></li>
                  <li><a href="{{route('portfolio')}}"><span class="icon-long-arrow-right mr-2"></span>Portfolio</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Have a Questions?</h2>
                  <div class="block-23 mb-0">
                    <ul>
                      <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                      <li><a href="#"><span class="icon icon-phone"></span><span class="text">+88 017 37 481778</span></a></li>
                      <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@shibbiritgmail.com</span></a></li>
                    </ul>
                  </div>
                  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>








    <script type="text/javascript" src="{{asset('myjs/myscript.js')}}" ></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('js/google-map.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    {{-- <script defer type="text/javascript">
        //select all modal link
        const modal_links   = document.querySelectorAll(".modal_link");
        ///select all modal
        const modals        = document.querySelectorAll('.modal');
        function removeShowModal()
        {
            modals.forEach(modal=>{
                // console.log(modal);
                modal.classList.remove('show');
                modal.style.display = "none";
            });
        }
        modal_links.forEach(modal_link=>{
              modal_link.addEventListener('click',function(){
                   console.log(this);
                    targetModal         = this.dataset.target;
                    targetModal_id      = targetModal.split('#')[1];//modal_id
                    targetModalElement  = document.getElementById(targetModal_id);
                    // console.log(targetModalElement);
                    removeShowModal()
                    targetModalElement.classList.add('show');
                    targetModalElement.style.display="block";


              });
            //console.log(modal_link);
        });
    </script> --}}


    <script defer  type="text/javascript">
            $('.subscribe').on('click',function(){
                    let authuser_id = this.dataset.authuser;
                    // console.log(authuser_id);

                    if(authuser_id == 0 ){
                          location.href="{{route('login')}}";
                          alert('Please login to subscribe');
                    }

                    else if(authuser_id > 0){

                         $.ajax({
                             url    : "{{url('subscribe')}}/"+authuser_id,
                             type   : "GET",
                             success: function(data){
                                   alert(data);
                             }
                         });
                    }

            });

    </script>


 </body>
</html>
