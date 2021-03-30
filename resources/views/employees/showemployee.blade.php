@extends("layout.backendmaster")
@section("backendcontent")
@can("isAdmin")
<script type="text/javascript" src="/jquery.js"></script>
<style type="text/css">
  td div{
    margin-top: 0px;
  }
</style>
	<div class="container table-responsive " style="margin-top: 20px;" >
    <a href="{{url('employees/create')}}" class="btn btn-success">{{@trans("public.addnewemployees")}}</a>
    <table class="table table-hover table-border">
      <center><h3><span>{{@trans("public.allemployees")}}</span></h3></center>
      <th class="text-center">{{@trans("public.number")}}</th>
      <th class="text-center">{{@trans("public.firstname")}}</th>
      <th class="text-center">{{@trans("public.da_firstname")}}</th>
      <th class="text-center">{{@trans("public.lastname")}}</th>
      <th class="text-center">{{@trans("public.da_lastname")}}</th>
      <th class="text-center">{{@trans("public.image")}}</th>
      <th class="text-center">{{@trans("public.feturework")}}</th>
      <th class="text-center">{{@trans("public.da_feturework")}}</th>
      <th class="text-center">{{@trans("public.skill")}}</th>
      <th class="text-center">{{@trans("public.registerdate")}}</th>
      <th class="text-center">{{@trans("public.salary")}}</th>
      <th class="text-center">{{@trans("public.option")}}</th>
      <?php $number = 1; ?>
     @foreach($employees as $employee)
     <tr id="refresh{{$employee->id}}">
       <td><?php echo $number; ?></td>
       <td>{{$employee->firstName}}</td>
       <td>{{$employee->da_firstName}}</td>
       <td>{{$employee->lastName}}</td>
       <td>{{$employee->da_lastName}}</td>
       <td>{{$employee->feature_work}}</td>
       <td>{{$employee->da_feature_work}}</td>
       <td>{{$employee->service_id}}</td>
       <td>{{$employee->register_date}}</td>
       <td>{{$employee->salary}}</td>
       <td>
          <img src="uploads/{{$employee->image}}" class="img-circle" width="40" height="40" />
       </td>
       <td>
        <a href="employees/{{$employee->id}}/edit" class="btn btn-warning btn-circle editemployee" title="{{@trans('public.edit')}}" id="{{$employee->id}}"><i class="fa fa-edit"></i></a>
        <a href="#" title="{{@trans('public.delete')}}" class="btn btn-danger btn-circle deleteemployees" id="{{$employee->id}}"><i class="fa fa-trash"></i></a>
       </td>
     </tr>
     <?php $number++; ?>
     @endforeach
    </table>
{{csrf_field()}}
  <script type="text/javascript">
    var id;
    
    $(document).on("click",".deleteemployees",function(){
      id  = $(this).attr("id");
      if(confirm("{{@trans('public.deletealert')}}")){
        $.ajax({
          url:"/employees/"+id,
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