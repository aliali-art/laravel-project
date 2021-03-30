@extends("layout.backendmaster")
@section("backendcontent")
@can("isAdmin")
<script type="text/javascript" src="jquery.js"></script>
<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <div class="row">
      <div class="ml-md-2 ml-lg-2"></div>
  <div class="ml-lg-8 ml-md-8" >

   
  </div>
    </div>
  </div>
</section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <div class="row">
          <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
            <div class="text px-4 ftco-animate">
                  <center><h3><span id="spantitle">{{@trans("public.addnewabout")}}</span></h3></center>
                   <form action="{{url('abouts')}}" method="post" id="insertform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group">
                        <div class="ml-md-6">
                         <label >{{@trans("public.title")}} :</label>
                         <input type="text" name="title" class="form-control" placeholder="{{@trans('public.title')}} :">
                        </div>
                       <div class="ml-md-6">
                         <label >{{@trans("public.da_title")}} :</label>
                         <input type="text" style="direction: rtl;" name="da_title" class="form-control" placeholder="{{@trans('public.da_title')}} :">
                       </div>
                     </div>
                     <div class="form-group">
                      <div class="ml-md-6">
                      <label>{{@trans("public.body")}} :</label>
                       <textarea class="form-control" name="body"></textarea>
                     </div>
                     <div class="ml-md-6">
                      <label>{{@trans("public.da_body")}} :</label>
                       <textarea class="form-control" style="direction: rtl;" name="da_body"></textarea>
                     </div>
                     </div>
                     <br><br>
                     <div class="form-group">
                      <div class="ml-md-6">
                     <center>
                        <input type="hidden" name="state" id="state">
                        <div style="width:130px;height: 110px;text-align: center;position: relative" id="image">
                            <img width="100%" height="100%" class="img-circle" id="preview_image" src="/images/noimage.jpg"/>
                            <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display:                         none"></i>
                           </div>
                            <p>
                            <a href="javascript:changeProfile()" style="text-decoration: none;">
                                <span class="glyphicon glyphicon-edit"></span>{{@trans('public.choiceimage')}}
                            </a>&nbsp;&nbsp;
                            <a href="javascript:removeFile()" style="color: red;text-decoration: none;">
                                <span class="glyphicon glyphicon-trash"></span>
                                {{@trans('public.delete')}}
                           </a>
                         </p>
                          <input type="file" id="file" style="display: none"/>
                          <input type="hidden" name="image" id="file_name"/>
                      </center>
                    </div>
                        <div class="ml-md-6" style="margin-top: 90px;">
                          <input type="submit" name="submit" value="{{@trans('public.insert')}}" class="form-control btn btn-success">
                        </div>
                      </div>
                   </form>
                    <div id="updateform"></div>
            </div>
          </div>
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4"><center><h3><span>{{@trans("public.allabouts")}}</span></h3></center></h2>
            
            <div class="row mt-5 table-responsive " >
             <table class="table  table-hover table-bordered table-striped table-condensed ">
          <th class="text-center ">{{@trans("public.number")}}</th>
          <th class="text-center mt-1">{{@trans("public.title")}}</th>
          <th class="text-center mt-1">{{@trans("public.da_title")}}</th>
          <th class="text-center mt-2" style="max-width: 10%;">{{@trans("public.body")}}</th>
          <th class="text-center mt-2" style="max-width: 10%">{{@trans("public.da_body")}}</th>
          <th class="text-center mt-2">{{@trans("public.image")}}</th>
          <th class="text-center mt-2">{{@trans("public.option")}}</th>
          <?php $number = 1; ?>
         @foreach($abouts as $about)
         <tr id="refresh{{$about->id}}">
           <td><?php echo $number; ?></td>
           <td>{{$about->title}}</td>
           <td>{{$about->da_title}}</td>
           <td>{{$about->body}}</td>
           <td>{{$about->da_body}}</td>
           <td><img width="80%" src="uploads/{{$about->image}}"/></td>
           <td>
            <a href="#" class="btn btn-warning btn-circle editabout"  title="{{@trans('public.edit')}}" id="{{$about->id}}"><span class="fa fa-edit"></span></a>
            <a href="#" title="{{@trans('public.delete')}}" class="btn btn-danger btn-circle deleteabouts" id="{{$about->id}}"><span class="fa fa-trash"></span></a>
           </td>
         </tr>
         <?php $number++; ?>
         @endforeach
        </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End modal for delete slide show -->

  <script type="text/javascript">
    var id;
    $(document).on('click',".editabout",function(){
      id = $(this).attr("id");
      $("#insertform").fadeOut("100");
       $("#updateform").fadeIn("100");
       $("#spantitle").text("{{@trans('public.updateabouts')}}");
      $.ajax({
        url:"{{url('abouts')}}"+"/"+id+"/edit",
        type:"get",
        data:{"_token":$("input[name=_token]").val()},
        success:function(data){
          $("#updateform").html(
            '<form action="abouts/'+data[0]+'" method="post">'+
            '<input type="hidden" name="_method" value="PUT">'+
            '<input type="hidden" name="_token" value="{{csrf_token()}}">'+
            '<div class="form-group">'+
            '<label>{{@trans("public.title")}} :</label>'+
            '<input type="text" name="title" class="form-control" id="u_title" value="'+data[1]+'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label>{{@trans("public.da_title")}} :</label>'+
            '<input type="text" name="da_title" class="form-control" value="'+data[2]+'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label>{{@trans("public.body")}} :</label>'+
            '<input type="text" class="form-control" name="body" id="u_body" value="'+data[3]+'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label>{{@trans("public.da_body")}} :</label>'+
            '<input type="text" class="form-control" name="da_body" id="u_body" value="'+data[4]+'">'+
            '</div>'+
            '<center>'+
            '<input type="hidden" name="state" id="state">'+
            '<div style="width:130px;height: 110px;text-align: center;position: relative" id="image">'+
            '<img width="100%" height="100%" class="img-circle" id="preview_image" src="uploads/'+data[5]+'"/>'+
            '<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display:none"></i>'+
            '</div>'+
            '<p>'+
            '<a href="javascript:changeProfile()" style="text-decoration: none;">'+
                '<i class="glyphicon glyphicon-edit"></i>{{@trans("public.choiceimage")}}</a>&nbsp;&nbsp;'+
            '<a href="javascript:removeFile()" style="color: red;text-decoration: none;"><i class="glyphicon glyphicon-trash"></i>{{@trans("public.delete")}}</a>'+
            '</p>'+
            '<input type="file" id="file" style="display: none"/>'+
            '<input type="hidden" name="image" id="file_name"/>'+
            '</center>'+
            '<div class="text-center">'+
            '<button name="submit"  class="btn  btn-success" >{{@trans("public.edit")}}<i class="fa fa-check"></i></button>'+
            '<a href="#"  id="cancel" class="btn  default" >{{@trans("public.cancel")}}<i class="fa fa-reply"></i></a>'+
            '</div>'+
            '</form>'
            )

        }
      })

    });
    $(document).on("click","#cancel",function(){
      $("#updateform").fadeOut("100");
      $("#insertform").fadeIn("100");
      $("#spantitle").text("{{@trans('public.addnewabout')}}");
    });
    $(document).on("click",".deleteabouts",function(){
      id  = $(this).attr("id");
      if(confirm("{{@trans('public.deletealert')}}")){
        $.ajax({
          url:"{{url('abouts')}}"+"/"+id,
          type:"DELETE",
          data:{"_token":$("input[name=_token]").val()},
          success:function(data){
            $("#refresh"+id).fadeOut("3000");
          }
        });
      }
    });
  </script>
  
@endcan
@endsection
