@extends("layout.backendmaster")
@section("backendcontent")
	<div class="container">
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 well">
    <center><h3><span>{{@trans("public.updateslideshow")}}</span></h3></center>
		
		<form method="post" action="{{url('slideshows')}}/{{$slideshow->id}}">
      <input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
        <center><label>{{@trans('public.title')}}</label></center>
        <input type="text" class="form-control" id="slide_title" name="slide_title" value="{{$slideshow->slide_title}}" >
      </div>
      <div class="form-group">
				<center><label>{{@trans('public.da_title')}}</label></center>
				<input type="text" class="form-control" id="da_slide_title" name="da_slide_title" value="{{$slideshow->da_slide_title}}" >
			</div>
			<center>
				<label>{{@trans('public.image')}}</label>
              <input type="hidden" name="state" id="state">
              <div style="width:200px;height: 170px;text-align: center;position: relative" id="image">
                  <img width="100%" height="100%" class="img-circle" id="preview_image" src="uploads/{{$slideshow->slide_image}}"/>
                  <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display:                         none"></i>
                 </div>
                  <p>
                  <a href="javascript:changeProfile()" style="text-decoration: none;">
                      <i class="glyphicon glyphicon-edit"></i>{{@trans('public.choiceimage')}}
                  </a>&nbsp;&nbsp;
                  <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                      <i class="glyphicon glyphicon-trash"></i>
                      {{@trans('public.delete')}}
                 </a>
               </p>
                <input type="file" id="file" style="display: none"/>
                <input type="hidden" name="slide_image" id="file_name"/>
            </center>
            <div class="form-group">
            	<div class="row col-md-6">
            		<a href="{{url('uppertechs')}}" class="btn btn-default">{{@trans('public.cancel')}}</a>
            	</div>
            	<div class="row col-md-6">
            		<input type="submit" name="submit" value="{{@trans('public.edit')}}" class="form-control btn btn-success">
            	</div>
            </div>
		</form>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-3 col-xs-1"></div>

@endsection