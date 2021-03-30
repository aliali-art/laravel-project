 @extends("layout.master")
 @section("content")
 <style type="text/css">
 	
 </style>
    <section class="home-slider owl-carousel" style="direction: ltr;">
    	@foreach($about_slideshow[0] as $slideshow)
      <div class="slider-item" style="background-image:url('uploads/{{$slideshow->slide_image}}');" id="sliderefresh{{$slideshow->id}}">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
          	@if(session()->get('lang')=="da")
            <h1 class="mb-4"><span>{{$slideshow->da_slide_title}}</span></h1>
            @else
            <h1 class="mb-4"><span>{{$slideshow->slide_title}}</span></h1>
            @endif
            @can("isAdmin")
            <a href="#" style="color: red;" class="glyphicon glyphicon-trash delete1" title="{{@trans('public.delete')}}" data-target="#deleteslideshow" data-toggle="modal" id="{{$slideshow->id}}">{{@trans('public.delete')}}</a>
             <a href="slideshows/{{$slideshow->id}}/edit" class="fa fa-edit" title="{{@trans('public.edit')}}" >{{@trans('public.edit')}}</a>
             @endcan
          </div>
        </div>
        </div>
      </div>
      @endforeach
    </section>
    <!-- Begin  Modal for delete slide show  -->
       <div class="modal fade" id="deleteslideshow" style="margin-top: 5%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
              <div class="modal-body">
                <center><span><h3>{{@trans("public.deletealert")}}</h3></span></center>
              </div>
              <div class="modal-footer">
                <button class="delete"><i class="btn btn-warning" data-dismiss="modal">{{@trans('public.yes')}}</i></button>
                <button class="" data-dismiss="modal"><i class="btn btn-success">{{@trans('public.no')}}</i></button>
              </div>
          </div>
      </div>
    </div>
  </div>
    <!-- End modal for delete slide show -->
    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Certified Teachers</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Special Education</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Book &amp; Library</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Certification</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section" >
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
		          	<div class="col-md-8 text-center heading-section ftco-animate">
			            <h2 class="mb-4">{{@trans('public.aboutcompany')}}</h2>
			            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
		            </div>
        		</div>	
				<div class="row">
					@foreach($about_slideshow[1] as $about)
					<div class="col-md-6 course d-lg-flex ftco-animate">
						<div class="img" style="background-image: url('uploads/{{$about->image}}');">
						</div>
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
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
						<div class="text px-4 ftco-animate">
	          	<h2 class="mb-4">Welcome to Kiddos Learning School</h2>
							<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.</p>
							<p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
						</div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2  class="mb-4"><span>@if(Session()->get("lang")=="da")  @else Our @endif</span>{{@trans("public.services")}}</h2>
						<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
						<div class="row mt-5">
							@foreach($services_employees[0] as $service)
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span ><img src="/assets/images/loc.png"></span></div>
									<div class="text">
										@if(session()->get("lang")=="da")
											<h3>{{$service->da_title}}</h3>
											<label style="direction: rtl;float: right;">{{$service->da_body}}</label>
										@else
											<h3>{{$service->title}}</h3>
											<label>{{$service->body}}</label>
										@endif
									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ftco-intro" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h2>Teaching Your Child Some Good Manners</h2>
						<p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					</div>
					<div class="col-md-3 d-flex align-items-center">
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Take a Course</a></p>
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
				@foreach($services_employees[1] as $employee)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url('uploads/{{$employee->image}}');"></div>
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


		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('assets/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
            <h2 class="mb-4"><span>20 Years of</span> Experience</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-10">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="351">0</strong>
		                <span>Successful Kids</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="564">0</strong>
		                <span>Happy Parents</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="300">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light" style="direction: ltr;">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>What Parents</span> Says About Us</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">

			@foreach($services_employees[1] as $employee)
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('uploads/{{$employee->image}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    @if(session()->get("lang")=="da")
					<p>{{$employee->da_firstName." ". $employee->lastName ." دربخش      ".$employee->service->da_title." فعالیت میکند و ".$employee->service->da_body . " ".$employee->da_firstName." ". $employee->da_lastName ." سابقه کاری  ".$employee->da_feature_work."دارد "}}</p>
					@else
					<p>{{$employee->firstName." ". $employee->lastName ." develop ".$employee->service->title." and ".$employee->service->body . " ".$employee->firstName." ". $employee->lastName ." has skill in ".$employee->feature_work}}</p>
					@endif
                    @if(session()->get("lang")=="da")
						<p class="name">{{$service->da_title}}</p>
						<span class="position">{{$service->da_body}}</span>
					@else
						<p class="name">{{$service->title}}</p>
						<span class="position">{{$service->body}}</span>
					@endif
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url('assets/images/uppermenu.jpg');" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5 bg-primary" >
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	            <h2 class="mb-4">{{@trans("public.message")}}</h2>
	            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	          </div>
	          <form action="#" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="{{@trans('public.firstname')}} :" name="firstName" autocomplete="off" id="firstName">
                  <label style="color: red; display: none;" id="errorfirstname">{{@trans("public.requesterror")}}</label>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="{{@trans('public.lastname')}} :" name="lastName" autocomplete="off" id="lastName">
		    				</div>
	    				</div>
              <div class="d-md-flex">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="{{@trans('public.email')}} :" name="email" autocomplete="off" id="email">
                  <label style="color: red; display: none;" id="erroremail">{{@trans("public.requesterror")}}</label>
                </div>
              </div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<div class="form-field">
          					<div class="select-wrap">
                      <input type="text" placeholder="{{@trans('public.company')}}" name="" autocomplete="off" class="form-control" id="company">
                    </div>
		              </div>
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="{{@trans('public.phone')}}" name="phone" id="phone">
                  <label style="color: red; display: none;" id="errorphone">{{@trans("public.requesterror")}}</label>
		    				</div>
	    				</div>
              <div class="d-md-flex">
                <div class="form-group">
                  <textarea  class="form-control" placeholder="{{@trans('public.message')}}" name="message" id="message"></textarea>
                  <label style="color: red; display: none;" id="errormessage">{{@trans("public.requesterror")}}</label>
                </div>
              </div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
                  <input type="text" name="country" placeholder="{{@trans('public.country')}}" class="form-control" id="country">
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="button" class="btn btn-secondary py-3 px-4" id="send" data-target="#requestsend" data-toggle="modal" onmouseover="requestFunction()" onfocus="requestFunction()" value="{{@trans('public.send')}}" >
		            </div>
	    				</div>
                 

	    			</form>
    			</div>
        </div>
    	</div>
    </section>
                   <!-- model for request sent -->
                     <div class="modal fade" id="requestsend" style="margin-top: 10%;"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                          <div class="modal-content">
                            <div class="modal-header">
                            </div>
                              <div class="modal-body">
                                <span style="display: none; color: red;" id="requesterror">{{@trans("public.requesterror")}}</span>
                                <div class="d-md-flex">
                                  <div class="form-group">
                                    <input type="checkbox" id="notrobot"  style="border-color: red;" >
                                  </div>
                                  <div class="form-group ml-md-4">
                                    <label for="notrobot" id="textnotrobot">{{@trans("public.robot")}}</label>
                                  </div>
                                </div>
                                <div style="display: none;" id="calcdiv"><span  id="calculate"></span><input type="text" name="" id="calc" size="10" ><button id="calculated" class="btn btn-success">{{@trans("public.calculate")}}</button></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                <!-- end modal -->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>@if(Session()->get("lang")=="da")  @else Our @endif</span> {{@trans("public.projectdemo")}}</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
    		<div class="row">
          @foreach($services_employees[2] as $project_demo)
        	<div class="col-md-6 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			@if(Session()->get("lang")=="da")<h3 class="mb-3">{{$project_demo->da_title}}</h3>
                @else
                <h3 class="mb-3">{{$project_demo->title}}</h3>
                @endif
	        			<p><span class="price">@if(Session()->get("lang")=="da")قمت  @else Quantity @endif</span> <span class="per">{{$project_demo->quantity}}</span></p>
	        		</div>
	        		<div class="img" style="background-image: url('uploads/{{$project_demo->image}}');"></div>
	        		<div class="px-4">
	        			@if(Session()->get("lang")=="da")<p>{{$project_demo->da_body}}</p>
                @else
                <p>{{$project_demo->body}}</p>
                @endif
        			</div>
        		</div>
        	</div>
          @endforeach

        </div>
    	</div>
    </section>

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
         <div class="col-md-3 ftco-animate">
            <a href="{{url('assets/images/image_1.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('assets/images/course-1.jpg');">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="{{url('assets/images/image_2.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('assets/images/image_2.jpg');">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="assets/images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url('assets/images/image_3.jpg');">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="assets/images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url('assets/images/image_4.jpg');">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
        </div>
    	</div>
    </section>
    {{csrf_field()}}
@include("indexscript")
@endsection