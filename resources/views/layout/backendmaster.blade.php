<!DOCTYPE html>
<html lang="en" id="html">
	
<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 10:29:53 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>Uppertechs</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/bootstrap4-rtl/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/themify-icons/themify-icons.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/animate.css/animate.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/jscrollpane/jquery.jscrollpane.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/waves/waves.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/switchery/dist/switchery.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/morris/morris.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/jvectormap/jquery-jvectormap-2.0.3.css')}}">
		<link rel="stylesheet" href="{{URL::asset('/backendassets/vendor/dropify/dist/css/dropify.min.css')}}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="{{URL::asset('/backendassets/css/core.css')}}">
		    <?php if(session()->get("lang")=="da"){ ?>
			    <style type="text/css">
			        #html{
			             direction: rtl;
			        }
			    </style>
			    <?php }else{ ?>
			        <style type="text/css">
			            #html{
			                direction: ltr;
			            }
			        
			    </style>
			<?php } ?>

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="fixed-sidebar fixed-header skin-default">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="site-sidebar">
				<div class="custom-scroll custom-scroll-light">
					<ul class="sidebar-menu">
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-text"> <a href="{{url('uppertechs')}}">{{@trans("public.home")}}</a></span>
							</a>
						</li>
						@can("isAdmin")
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-light">
								<span class="s-text">{{@trans("public.setting")}}</span>
							</a>
							<ul>
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
			


			<!-- Header -->
			<div class="site-header">
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" href="index.html">
							<div class=""></div>
						</a>
						<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<i class="ti-arrow-right"></i>
						</div>
						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more">fdfdf</span>
						</div>
					</div>
					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
						<div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second light float-xs-right hidden-sm-down">
							<i class="ti-arrow-right"></i>
						</div>
						<ul class="nav navbar-nav float-md-right">
							
							
							
						</ul>
						<ul class="nav navbar-nav">
							<li class="nav-item hidden-sm-down">
								<a class="nav-link toggle-fullscreen" href="#">
									<i class="ti-fullscreen"></i>
								</a>
							</li>
							<li class="nav-item dropdown hidden-sm-down">
								<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
									<i class="">{{@trans("public.language")}}</i>
								</a>
								<div class="dropdown-apps dropdown-menu animated fadeInUp">
									<div class="a-grid">
										<div class="row row-sm">
											<div class="col-xs-4">
												<div class="a-item">
													<a href="{{url('localize/en')}}">
														<div class="ai-icon"><img class="img-fluid" src="img/brands/dropbox.png" alt=""></div><span>English</span>
													</a>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="a-item">
													<a href="{{url('localize/da')}}">
														<div class="ai-icon"><img class="img-fluid" src="assets/images/afg.gif" alt=""></div><span>دری</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>

				</nav>
			</div>
			

			<div class="site-content">
				<!-- Content -->
				@yield("backendcontent")
				<!-- Footer -->
				
			</div>

		</div>

		<!-- Vendor JS -->
		<!-- Vendor JS -->
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/bootstrap4-rtl/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jscrollpane/mwheelIntent.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/waves/waves.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/switchery/dist/switchery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/flot/jquery.flot.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/flot/jquery.flot.resize.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/CurvedLines/curvedLines.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/TinyColor/tinycolor.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/raphael/raphael.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/morris/morris.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/peity/jquery.peity.js')}}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{URL::asset('/backendassets/js/app.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/js/demo.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/js/index.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/vendor/dropify/dist/js/dropify.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/backendassets/js/forms-upload.js')}}"></script>

		<script type="text/javascript">
    function changeProfile() {
        $('#file').click();
    }
    $('#file').change(function () {
        if ($(this).val() != '') {
            upload(this);

        }
    });
    function upload(img) {
        var form_data = new FormData();

        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');

        $('#loading').css('display', 'block');
        $.ajax({
            url: "{{url('ajax-image-upload')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name').val(data);
                    $('#preview_image').attr('src', '{{asset('uploads')}}/' + data);
                }
                $('#loading').css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }
    function removeFile() {
        if ($('#file_name').val() != '')
            if (confirm('آیا  میخواهید حذف کنید پروفایل تان را ؟')) {
                $('#loading').css('display', 'block');
                var form_data = new FormData();
                form_data.append('_method', 'DELETE');
                form_data.append('_token', '{{csrf_token()}}');
                $.ajax({
                    url: "ajax-remove-image/" + $('#file_name').val(),
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                        $('#file_name').val('');
                        $('#loading').css('display', 'none');
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
    }
    </script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 10:43:36 GMT -->
</html>