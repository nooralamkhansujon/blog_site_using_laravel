@extends('frontend.app')

@section('counter')
     @include('frontend.partials.counter')
@endsection

@section('content')

<section class="ftco-section ftco-no-pb ftco-services" id="practice-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
        <div class="col-md-10 heading-section text-center ftco-animate">
            <span class="subheading">Site Category Area</span>
          <h2 class="mb-4">Developed Application</h2>
          <p>
              we Develop every kinds of application.just click every category and select
              what type site do you want to design or develop by us.
          </p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-md-5 col-lg-3 ftco-animate py-4 nav-link-wrap">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            @foreach($projects as $project)
                 <a class="nav-link px-4 py-1" id="v-pills-{{$project->id}}-tab" data-toggle="pill" href="#v-pills-{{$project->id}}" role="tab" aria-controls="v-pills-{{$project->id}}" aria-selected="false">
                <span class="mr-3 flaticon-idea"></span>{{$project->project_title}}</a>
            @endforeach


          </div>
        </div>
        <div class="col-md-7 col-lg-9 ftco-animate p-4 p-md-5 d-flex align-items-center">

          <div class="tab-content pl-lg-4" id="v-pills-tabContent">
            @php $project_id = $projects[0]->id; @endphp
            @foreach($projects as $project)
                 <div class="tab-pane {{($project->id == $project_id)? 'show  active':'' }}  py-0 py-lg-5" id="v-pills-{{$project->id}}" role="tabpanel"
                      aria-labelledby="v-pills-{{$project->id}}-tab">
                    <div class="row">
                        <div class="col-md-4 offset-md-1">
                           <img style="height:100%;width:100%" src="{{asset('storage/'.$project->project_image)}}" alt="">
                        </div>
                        <div class="text col-md-6">
                           <h2 class="mb-4 ">{{$project->project_title}}</h2>
                            <p>{{$project->project_description}}</p>
                            <p><a href="{{route('project.details',$project)}}" class="btn btn-primary px-4 py-3">Learn More</a></p>
                        </div>
                     </div>
                </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
