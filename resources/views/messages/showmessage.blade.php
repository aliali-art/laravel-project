@extends("layout.backendmaster")
@section("backendcontent")
@can("isAdmin")
<style type="text/css">
  td div{
    margin-top: 0px;
  }
</style>
<script type="text/javascript" src="jquery.js"></script>
  <div class="container table-responsive " style="margin-top: 20px;">
    <table class="table table-hover table-border">
      <center><h3><span>{{@trans("public.message")}}</span></h3></center>
      <th class="text-center">{{@trans("public.number")}}</th>
      <th class="text-center">{{@trans("public.firstname")}}</th>
      <th class="text-center">{{@trans("public.firstname")}}</th>
      <th class="text-center">{{@trans("public.email")}}</th>
      <th class="text-center">{{@trans("public.company")}}</th>
      <th class="text-center">{{@trans("public.phone")}}</th>
      <th class="text-center">{{@trans("public.country")}}</th>
      <th class="text-center">{{@trans("public.message")}}</th>
      <th class="text-center">{{@trans("public.option")}}</th>
      <?php $number = 1; ?>
     @foreach($recievemessages as $recievemessage)
     <tr id="refresh{{$recievemessage->id}}">
       <td><?php echo $number; ?></td>
       <td>{{$recievemessage->firstName}}</td>
       <td>{{$recievemessage->lastName}}</td>
       <td>{{$recievemessage->email}}</td>
       <td>{{$recievemessage->company}}</td>
       <td>{{$recievemessage->phone}}</td>
       <td>{{$recievemessage->country}}</td>
       <td>{{$recievemessage->message}}</td>
       <td>
        <a href="#" title="{{@trans('public.delete')}}" class="btn btn-danger btn-circle deleterecievemessages" id="{{$recievemessage->id}}"><i class="fa fa-trash"></i></a>
       </td>
     </tr>
     <?php $number++; ?>
     @endforeach
    </table>
{{csrf_field()}}
  <script type="text/javascript">
    var id;
    
    $(document).on("click",".deleterecievemessages",function(){
      id  = $(this).attr("id");
      if(confirm("{{@trans('public.deletealert')}}")){
        $.ajax({
          url:"recievemessage/"+id,
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