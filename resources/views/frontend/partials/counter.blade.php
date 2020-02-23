
<section class="hero-wrap js-fullheight" style="background-image: url('{{asset('images/bg_1.jpg')}}');" data-section="home">
        <div class="overlay"></div>
        <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                        <div class="col-md-6 ftco-animate" data-scrollax="properties: { translateY: '70%' }">
                            <h1  class="mb-4" data-scrollax="properties: {translateY: '30%', opacity: 1.6 }">Web Developer base on php and laravel</h1>
                            <p class="hiding" >Hi! i am jquery coding.click me to check your instruction. </p>
                            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                                I am Web Developer.I love developing.Also, I am junior wordpress theme developer.
                                I am not expert designer but, I have knowldge of HTML,CSS,JAVASCRIPT,JQUERY,BOOTSTRAP.
                            </p>

                            <p>
                                @if(auth()->user())
                                    @if(auth()->user()->isSubscribe())
                                        <a href="#" class="nav-link"
                                        style="width:150px;border-radius:5px;cursor:not-allowed;background:#fff;color:black;">Subscribed</a>
                                    @else
                                        <a href="#" class="btn btn-primary py-3 px-4 subscribe"
                                           data-authuser="{{auth()->user()->id}}">Subscribe Us</a>

                                    @endif
                                @else
                                     <a href="#" class="btn btn-primary py-3 px-4 subscribe"
                                     data-authuser="{{(auth()->user())?Auth()->user()->id:0}}">Subscribe Us</a>
                                @endif
                            </p>
                        </div>
                </div>
        </div>
</section>



<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
    <div class="container">
        <div class="row d-md-flex align-items-center justify-content-end">
            <div class="col-lg-12">
                <div class="ftco-counter-wrap">
                    <div class="row no-gutters d-md-flex align-items-center align-items-stretch">
                  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                      <div class="text">
                          <div class="icon d-flex justify-content-center align-items-center">
                              <span class="flaticon-house"></span>
                          </div>
                        <strong class="number" data-number="3">0</strong>
                        <span>Years of Experienced</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                      <div class="text">
                          <div class="icon d-flex justify-content-center align-items-center">
                              <span class="flaticon-handshake"></span>
                          </div>
                        <strong class="number" data-number="{{config('total_subscribers')}}"></strong>
                        <span>Total Subscriber</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                      <div class="text">
                          <div class="icon d-flex justify-content-center align-items-center">
                              <span class="flaticon-lawyer"></span>
                          </div>
                        <strong class="number"
                        data-number="{{config('total_projects')}}">0</strong>
                        <span>Developed Project</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                      <div class="text">
                          <div class="icon d-flex justify-content-center align-items-center">
                              <span class="flaticon-medal"></span>
                          </div>
                        <strong class="number" data-number="3">0</strong>
                        <span>MY Honors &amp; Awards</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
      </div>
    </div>
    </div>
</section>
