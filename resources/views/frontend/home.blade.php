@extends('frontend.app')



@section('content')
<section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 col-lg-6 d-flex">
                <div class="img-about img d-flex align-items-stretch">
                    <div class="img d-flex align-self-stretch align-items-end"
                    style="background-image:url({{asset('images/shibbir_it.png')}});">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 pl-lg-5 py-5">
                <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate pb-5">
                  <span  class="subheading">Admiration</span>
                <h2 class="mb-4" style="font-size: 44px; text-transform: capitalize;">Client Speech</h2>

              </div>
    <div class="col-md-12 testimony-section">
            <div class="owl-carousel carousel-testimony">
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="text mb-5">
                                    <div class="icon">
                                        <span class="icon-quote-left"></span>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img img mr-3" style="background-image: url({{asset('images/person_1.jpg')}});"></div>
                                    <div>
                                        <p class="name mb-0">Mamunur Rashid</p>
                                        <span class="position">Interprenior</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                                <div class="testimony-wrap">
                                    <div class="text mb-5">
                                        <div class="icon">
                                            <span class="icon-quote-left"></span>
                                        </div>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="user-img img mr-3" style="background-image: url({{asset('images/person_2.jpg')}});"></div>
                                        <div>
                                            <p class="name mb-0">samyun mc</p>
                                            <span class="position">Developer</span>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="text mb-5">
                                    <div class="icon">
                                        <span class="icon-quote-left"></span>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img img mr-3" style="background-image: url({{asset('images/person_2.jpg')}});"></div>
                                    <div>
                                        <p class="name mb-0">Altaf Hosain</p>
                                        <span class="position">Teacher</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                                <div class="testimony-wrap">
                                <div class="text mb-5">
                                    <div class="icon">
                                        <span class="icon-quote-left"></span>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="user-img img mr-3" style="background-image: url({{asset('images/person_3.jpg')}});"></div>
                                        <div>
                                            <p class="name mb-0">noore alom</p>
                                            <span class="position">Doctor</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
    </div>
 </section>

@endsection
