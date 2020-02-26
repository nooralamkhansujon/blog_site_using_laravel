@extends('frontend.app')

@section('counter')
         @include('frontend.partials.counter')
 @endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-success">Project Datails</h2>
            </div>
            {{-- col-md-8 --}}
              @include('frontend.partials.details_section')
            {{-- end of col-md-8  --}}

            {{-- col-md-4 --}}
               @include('frontend.partials.details_sidebar')
            {{-- end of col-md-4  --}}

        </div>
    </div>
</section> <!-- .section -->


@endsection
