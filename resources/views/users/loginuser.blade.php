@extends("layout.backendmaster")
@section("backendcontent")
	<div class="container">
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 well" style="margin-top: 5%;">
		<center><img src="assets/images/logo for banner tmp.png" alt="Logo" /><br>
			<span style="color: blue;">{{@trans("public.login")}}</span>
				@if(Session::has("error"))
			        <div class="alert alert-danger ">
			            <button class="close"  data-dismiss="alert" type="button"></button>
			            <span> {{@trans(session()->get("error"))}}</span>
			        </div>
	        	@endif
		</center>
		<form method="post" action="{{url('loginuser')}}" mar>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<input type="email" name="email" autofocus="" class="form-control" placeholder="{{@trans('public.email')}}" autocomplete="off">
				@if(isset($errors))
	              @if($errors->has('email'))
	                <span style="color: red;">{{$errors->first("email")}}</span>
	              @endif
	            @endif

			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="{{@trans('public.password')}}" autocomplete="off">
				@if(isset($errors))
	              @if($errors->has('password'))
	                <span style="color: red;">{{$errors->first("password")}}</span>
	              @endif
	            @endif
			</div>
			<div class="form-group">
					<input type="submit" name="login" value="{{@trans('public.login')}}" class="form-control btn btn-success">
			</div>
		</form>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
@endsection