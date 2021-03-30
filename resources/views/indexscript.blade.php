    <!-- Script for send request -->
    <script type="text/javascript">
      var firstName,lastName,email,company,message,country,phone;
      function requestFunction(){
          firstName  = $("#firstName").val();
          lastName   = $("#lastName").val();
          email      = $("#email").val();
          company    = $("#company").val();
          message    = $("#message").val();
          country    = $("#country").val();
          phone      = $("#phone").val();

          if(firstName==""){
            $("#errorfirstname").fadeIn("1000");
            $("#notrobot").fadeOut("1000");
            $("#textnotrobot").fadeOut("1000");
            $("#requesterror").fadeIn("1000");
          }
          else{
            $("#errorfirstname").fadeOut("1000");
            $("#notrobot").fadeIn("1000");
            $("#textnotrobot").fadeIn("1000");
            $("#requesterror").fadeOut("1000");
          }
          if(email==""){
            $("#erroremail").fadeIn("1000");
            $("#notrobot").fadeOut("1000");
            $("#textnotrobot").fadeOut("1000");
            $("#requesterror").fadeIn("1000");
          }
          else{
            $("#erroremail").fadeOut("1000");
            $("#notrobot").fadeIn("1000");
            $("#textnotrobot").fadeIn("1000");
            $("#requesterror").fadeOut("1000");
          }
          if(message==""){
            $("#errormessage").fadeIn("1000");
            $("#notrobot").fadeOut("1000");
            $("#textnotrobot").fadeOut("1000");
            $("#requesterror").fadeIn("1000");
          }
          else{
            $("#errormessage").fadeOut("1000");
            $("#notrobot").fadeIn("1000");
            $("#textnotrobot").fadeIn("1000");
            $("#requesterror").fadeOut("1000");
          }
          if(phone.match(/^[0-9]+$/)){
            $("#errorphone").fadeOut("1000");
            $("#notrobot").fadeIn("1000");
            $("#textnotrobot").fadeIn("1000");
            $("#requesterror").fadeOut("1000");
          }
          else{
            $("#errorphone").fadeIn("1000");
            $("#notrobot").fadeOut("1000");
            $("#textnotrobot").fadeOut("1000");
            $("#requesterror").fadeIn("1000");
          }
      }
      var num1,num2;
       var checkbox ;
      $(document).on("click","#notrobot",function(){
         checkbox = document.getElementById("notrobot");
        if(checkbox.checked){
          $("#calcdiv").fadeIn("1000");
          num1 = Math.floor(Math.random() * 1000);
          num2 = Math.floor(Math.random()*100);
          $("#calculate").text("{{@trans('public.calculate')}} "+num1+"+"+num2+"= ?");
        }
        else{
          $("#calcdiv").fadeOut("1000");
        }
      });
      $(document).on("click","#calculated",function(){
        var numtext = $("#calc").val();
        if(numtext==(num1+num2)){
          $.ajax({
            url:"recievemessage",
            type:"post",
            data:{"firstName":firstName,"lastName":lastName,"email":email,"company":company,"phone":phone,"country":country,"message":message,"_token":$("input[name=_token]").val()},
            success:function(data){
               if(data=="success"){
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: '{{@trans("public.successmessage")}}',
                  showConfirmButton: false,
                  timer: 3000
                });
                $('#requestsend').modal('hide');
                $("#calcdiv").fadeOut("1000");
                checkbox.checked=false;
                $("#firstName").css("f")
               }
               else{
                Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  text: '{{@trans("public.errormessage")}}',
                });
                $('#requestsend').modal('hide');
                $("#calcdiv").fadeOut("1000");
                checkbox.checked=false;
               }
            },
            error:function(er){
              Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: '{{@trans("public.errormessage")}}',
              });
              $('#requestsend').modal('hide');
                $("#calcdiv").fadeOut("1000");
                checkbox.checked=false;
            }
          });
        }
        else{
          $("#sendbutton").fadeOut("1000");
        }
      });
    </script>
           <!-- Begin script for delete slide show  -->
    <script type="text/javascript">
      var id ;
      $(document).on("click",".delete1",function(){
        id = $(this).attr("id");
      });
      $(document).on("click",".delete",function(){
        $.ajax({
          url:"slideshows/"+id,
          type:"delete",
          data:{"_token":$('input[name=_token]').val()},
          success:function(data){
            $("#sliderefresh"+id).fadeOut("1000");
          }
        });
      });
    </script>
    <!-- end script for delete slide show -->