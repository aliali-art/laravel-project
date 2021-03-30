<!DOCTYPE html>
<html lang="en" id="html">
  <head>
    <title>Uppertechs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{URL::asset('assets/css/open-iconic-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/ionicons.min.css')}}">
    
    <link rel="stylesheet" href="{{URL::asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/sweetalert2/dist/sweetalert2.css')}}">
    <script type="text/javascript" src="jquery.js"></script>
     <?php if(session()->get("lang")=="da"){ ?>
    <style type="text/css">
     #html{
      direction: rtl;
     }
     
    </style>
  <?php } ?>

  </head>
  <body>
	  <div class="py-2 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
			    		<div class="col-md-5 pr-4 d-flex topper align-items-center">
			    			<div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text">198 West 21th Street, Suite 721 New York NY 10016</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <a href="tel:0093748232002"><span class="text">+ 1235 2355 98</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="uppertechs"><img src="assets/images/logo for banner tmp.png"  alt="Logo"  /></a>
        @can("isAdmin")
        <a href="{{url('recievemessage')}}" class="navbar-brand" title="{{@trans('public.countmessage')}}"><i class="icon-bell"></i><span class="badge badge-default" style="color: red;margin-left: -5px; min-width: 10px; border-radius: 12px; background-color: #bac3d0;">{{Session()->get("messages")}}</span></a>
        @endcan
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="{{url('/uppertechs')}}" class="nav-link pl-0">{{@trans("public.home")}}</a></li>
	        	<li class="nav-item"><a href="{{url('/aboutuppertechs')}}" class="nav-link">{{@trans("public.about")}}</a></li>
	        	<li class="nav-item"><a href="{{url('/ourservices')}}" class="nav-link">{{@trans('public.services')}}</a></li>
	        	<!--<li class="nav-item"><a href="courses.html" class="nav-link">Courses</a></li>-->
	        	<li class="nav-item"><a href="{{url('/ourdevelopers')}}" class="nav-link">{{@trans('public.ourdeveloper')}}</a></li>
	        	<li class="nav-item" style="margin-left: 36px;"><a href="{{url('/localize/en')}}" class="nav-link">English</a></li>
	          <li class="nav-item"><a href="{{url('/localize/da')}}" class="nav-link">دری</a></li>
	          @can("isAdmin")
				    <li class="dropdown dropdown-user" style="margin-top: 36px;">
					     <div class="beeperNub"></div>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span>{{@trans("public.setting")}}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                      <li class="active">
                          <a href="{{url('/upp_login_admin')}}" >{{@trans("public.login")}}</a>
                      </li>
                      <li>
                          <a href="{{url('logout_u_user')}}">{{@trans("public.logout")}}</a>
                      </li>
                      <li>
                          <a href="{{url('employees')}}">{{@trans("public.employee")}}</a>
                      </li>
                      <li>
                          <a href="{{url('slideshows/create')}}">{{@trans("public.addslideshow")}}</a>
                      </li>
                      <li>
                          <a href="{{url('services')}}">{{@trans("public.services")}}</a>
                      </li>
                      <li>
                          <a href="{{url('abouts')}}">{{@trans('public.about')}}</a>
                      </li>
                      <li>
                        <a href="{{url('project_demos')}}">{{@trans('public.projectdemo')}}</a>
                      </li>
                    </ul>
            	</li>
                 @endcan

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
@yield("content")
		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script type="text/javascript" src="{{URL::asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/aos.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/scrollax.min.js')}}"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <script src="{{URL::asset('assets/js/google-map.js')}}"></script>
  <script src="{{URL::asset('assets/js/main.js')}}"></script>

    
  </body>
</html>