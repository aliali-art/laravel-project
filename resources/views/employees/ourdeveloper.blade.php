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
		
				
		<section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
		            <div class="col-md-8 text-center heading-section ftco-animate">
			            <h2 class="mb-4">{{@trans('public.ourdeveloper')}}</h2>
			            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
		        	</div>
        		</div>	
			<div class="row">
				@foreach($employees as $employee)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url(uploads/{{$employee->image}});"></div>
						</div>
						<div class="text pt-3 text-center">
							@if(session()->get("lang")=="da")
							<h3>{{$employee->da_firstName." ".$employee->da_lastName}}</h3>
							@else
							<h3>{{$employee->firstName." ".$employee->lastName}}</h3>
							@endif
							<div class="faded">
								@if(session()->get("lang")=="da")
								<p>{{$employee->da_firstName." ". $employee->lastName ." دربخش      ".$employee->service->da_title." فعالیت میکند و ".$employee->service->da_body . " ".$employee->da_firstName." ". $employee->da_lastName ." سابقه کاری  ".$employee->da_feature_work."دارد "}}</p>
								@else
								<p>{{$employee->firstName." ". $employee->lastName ." develop ".$employee->service->title." and ".$employee->service->body . " ".$employee->firstName." ". $employee->lastName ." has skill in ".$employee->feature_work}}</p>
								@endif
								<ul class="ftco-social text-center">
				                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
				                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
				                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
				                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
				              </ul>
			              	</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			</div>
		</section>
@endsection