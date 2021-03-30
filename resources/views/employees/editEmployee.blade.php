@extends("layout.backendmaster")
@section("backendcontent")
@can("isAdmin")
<div class="container">
    <div class="portlet-body form well" >
        <div id="repeat_hide">
            <p class="text-center" style="font-size: 20px;"><strong>{{@trans("public.insertemployee")}}</strong></p>
            <!-- Begin span for Resived error from TeacherController -->
            
            <!-- End -->
            <!-- Begin form for registration new Teacher  -->
            <form  method="post" action="{{url('employees')}}/{{$employees->id}}" id="defaultForm"
                  data-bv-message="This value is not valid"
                  data-bv-feedbackicons-validating="fa fa-refresh" enctype="multipart/form-data">
                  <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="modal-body " style="padding: 20px 30px;">
                    <div class="row">
                        <div class="col-sm-12" id="add_sub">
                            <div class="form-body">
                               
                               <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="firstname">{{@trans("public.firstname")}}<span style="color:red"> : </span></label>
                                             <input type="text" class="form-control" autofocus="" placeholder="{{@trans('public.firstname')}}" name="firstname" id="firstname" autocomplete="off" value="{{$employees->firstName}}" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="da_firstname">{{@trans("public.da_firstname")}}<span style="color:red"> : </span></label>
                                             <input type="text" class="form-control" autofocus="" placeholder="{{@trans('public.da_firstname')}}" name="da_firstname" id="da_firstname" autocomplete="off" value="{{$employees->da_firstName}}" >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="lastname">{{@trans("public.lastname")}}<span style="color:red"> : </span></label>
                                                <input type="text"  name="lastname" placeholder="{{@trans('public.lastname')}}" autocomplete="off" class="form-control" id="lastname" value="{{$employees->lastName}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="da_lastname">{{@trans("public.da_lastname")}}<span style="color:red"> : </span></label>
                                                <input type="text"  name="da_lastname" placeholder="{{@trans('public.da_lastname')}}" autocomplete="off" class="form-control" id="da_lastname" value="{{$employees->da_lastName}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file_name" >{{@trans('public.image')}} <span style="color:red"> : </span></label>
                                            <center>
                                              <input type="hidden" name="state" id="state">
                                              <div style="width:130px;height: 110px;text-align: center;position: relative" id="                        image">
                                                  <img width="100%" height="100%" class="img-circle" id="preview_image" src='uploads/{{$employees->image}}'/>
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
                                                <input type="hidden" name="image_name" id="file_name"/>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="feturework">{{@trans("public.feturework")}}<span style="color:red"> : </span></label>
                                                <input type="text"  name="feturework" id="feturework" class="form-control" placeholder="{{@trans('public.feturework')}}" value="{{$employees->feature_work}}" >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="da_feturework">{{@trans("public.da_feturework")}}<span style="color:red"> : </span></label>
                                                <input type="text"  name="da_feturework" id="da_feturework" class="form-control" placeholder="{{@trans('public.da_feturework')}}" value="{{$employees->feature_work}}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(Session()->has("errors"))
                                <span>{{session()->get("errors")}}</span>
                                @endif
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service_id" >{{@trans("public.skill")}}<span style="color:red"> : </span></label>
                                            <select name="service_id" id="service_id"  class="form-control" required data-bv-notempty-message="">
                                                <option value=''>{{@trans("public.choseservice")}}</option>
                                                @foreach($services as $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="register_date" >{{@trans("public.registerdate")}}<span style="color:red"> : </span></label>
                                            <input type="date" name="register_date" placeholder="{{@trans('public.registerdate')}}" class="form-control" id="register_date" value="{{$employees->register_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="salary" >{{@trans("public.salary")}}<span style="color:red"> : </span></label>
                                            <input type="number" name="salary" id="salary" placeholder="{{@trans('public.salary')}}" class="form-control" value="{{$employees->salary}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label></label><br>
                                            <div class="text-center">
                                                <button type="submit"  class="btn  btn-success" >
                                                    {{@trans("public.edit")}}<i class="fa fa-check"></i>
                                                </button>
                                                <a href="{{url('employees')}}"  class="btn  default" >
                                                    {{@trans("public.cancel")}}<i class="fa fa-reply"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan
@endsection