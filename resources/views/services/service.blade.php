@extends("layout.backendmaster")
@section("backendcontent")
@can("isAdmin")
<script type="text/javascript" src="jquery.js"></script>
	<div class="container">

	<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 table-responsive ">
    <table class="table table-hover table-border">
      <center><h3><span>{{@trans("public.allservices")}}</span></h3></center>
      <th class="text-center">{{@trans("public.number")}}</th>
      <th class="text-center">{{@trans("public.title")}}</th>
      <th class="text-center">{{@trans("public.da_title")}}</th>
      <th class="text-center">{{@trans("public.body")}}</th>
      <th class="text-center">{{@trans("public.da_body")}}</th>
      <th class="text-center">{{@trans("public.option")}}</th>
      <?php $number = 1; ?>
     @foreach($services as $service)
     <tr id="refresh{{$service->id}}">
       <td><?php echo $number; ?></td>
       <td>{{$service->title}}</td>
       <td>{{$service->da_title}}</td>
       <td>{{$service->body}}</td>
       <td>{{$service->da_body}}</td>
       <td>
        <a href="#" class="btn btn-warning btn-circle editservice" title="{{@trans('public.edit')}}" id="{{$service->id}}"><i class="fa fa-edit"></i></a>
        <a href="#" title="{{@trans('public.delete')}}" class="btn btn-danger btn-circle deleteservices" id="{{$service->id}}"><i class="fa fa-trash"></i></a>
       </td>
     </tr>
     <?php $number++; ?>
     @endforeach
    </table>

	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 well" >
    <center><h3><span id="spantitle">{{@trans("public.addnewservice")}}</span></h3></center>
   <form action="services" method="post" id="insertform">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-group">
      <label >{{@trans("public.title")}} :</label>
       <input type="text" name="title" class="form-control" placeholder="{{@trans('public.title')}} :">
     </div>
     <div class="form-group">
      <label >{{@trans("public.da_title")}} :</label>
       <input type="text" name="da_title" class="form-control" placeholder="{{@trans('public.da_title')}} :">
     </div>
     <div class="form-group">
      <label>{{@trans("public.body")}} :</label>
       <textarea class="form-control" name="body"></textarea>
     </div>
     <div class="form-group">
      <label>{{@trans("public.da_body")}} :</label>
       <textarea class="form-control" name="da_body"></textarea>
     </div>
     <div class="form-group">
          <input type="submit" name="submit" value="{{@trans('public.insert')}}" class="form-control btn btn-success">
      </div>
   </form>
   <div id="updateform"></div>
  </div>
          <!-- Begin  Modal for delete slide show  -->
       <div class="modal fade" id="deleteservices" style="margin-top: 5%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

  <script type="text/javascript">
    var id;
    $(document).on('click',".editservice",function(){
      id = $(this).attr("id");
      $("#insertform").fadeOut("100");
       $("#updateform").fadeIn("100");
       $("#spantitle").text("{{@trans('public.updateservices')}}");
      $.ajax({
        url:"{{url('services')}}"+"/"+id+"/edit",
        type:"get",
        data:{"_token":$("input[name=_token]").val()},
        success:function(data){
          $("#updateform").html(
            '<form action="services/'+data[0]+'" method="post">'+
            '<input type="hidden" name="_method" value="PUT">'+
            '<input type="hidden" name="_token" value="{{csrf_token()}}">'+
            '<div class="form-group">'+
            '<label>{{@trans("public.title")}} :</label>'+
            '<input type="text" name="title" class="form-control"  value="'+data[1]+'">'+
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
            '<div class="text-center">'+
            '<button name="submit"  class="btn  btn-success" >{{@trans("public.edit")}}<i class="fa fa-check"></i></button>'+
            '<a href="#"  id="cancel" class="btn default" >{{@trans("public.cancel")}}<i class="fa fa-reply"></i></a>'+
            '</div>'+
            '</form>'
            )

        }
      })

    });
    $(document).on("click","#cancel",function(){
      $("#updateform").fadeOut("100");
      $("#insertform").fadeIn("100");
      $("#spantitle").text("{{@trans('public.addnewservice')}}");
    });
    $(document).on("click",".deleteservices",function(){
      id  = $(this).attr("id");
      if(confirm("{{@trans('public.deletealert')}}")){
        $.ajax({
          url:"{{url('services')}}"+"/"+id,
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