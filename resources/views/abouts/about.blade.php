@extends("layout.master")
@section("content")
    <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/uppermenu4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
      <center><h3>{{@trans('public.aboutcompany')}}</h3></center>
			<div class="container">
				<div class="row">
					@foreach($abouts as $about)
					<div class="col-md-6 course d-lg-flex ftco-animate">
						<div class="img" style="background-image: url(uploads/{{$about->image}});"></div>
						<div class="text bg-light p-4">
							@if(session()->get("lang")=="da")
                <h3>{{$about->da_title}}</h3>
                <p>{{$about->da_body}}</p>
              @else
                <h3>{{$about->title}}</h3>
                <p>{{$about->body}}</p>
              @endif
						</div>
					</div>
          @endforeach
				</div>
			</div>
		</section>
@endsection