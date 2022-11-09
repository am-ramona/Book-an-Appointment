	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Doctors</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/styles.css')}}">
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- 	<script src="{{ asset('js/script.js')}}"></script> -->
  <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
	</head>
		
  <body>				
		 @yield('content')
		 @yield('script')
		   <div id="general_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            {{ Form::open(array('id'=>'reset_password_form')) }}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            
              <div class="error"></div>
              <div class="modal-body"></div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn_anim" data-dismiss="modal">Cancel</button>
              <button type="submit" class="confirm btn green transition btn_anim"></button>
            </div>
            {{Form::close()}}
          </div>

        </div>
      </div> 
		
		<script>
function checkErrorRegister(elt) {

  if($(elt).val()!=''){
    $(elt).removeClass('error');
    $(elt).attr('title','').attr('data-original-title','');
    $('[data-toggle="tooltip"]').tooltip({
        title: function(){
          return $(this).attr('data-original-title');
        }
      }); 
  }

}
	   $('.forgot_password').click(function(){
				// 		 $('#general_modal').addClass('show').removeClass('fade');
						 $('#general_modal .modal-title').html('Reset Password')
						 $('#general_modal #reset_password_form button.confirm').html('Submit')
						 $('#general_modal .modal-body').html('<div class="form-group"><label>Email</label><input type="text" class="email" name="email" placeholder="Email" tabindex="1" data-toggle="tooltip"></div>')
						 $('#general_modal').modal('show')
		})

    $('#reset_password_form').submit(function(ev){
     ev.preventDefault();
  $(this).find('button.confirm').addClass('btn-loading');
  $(this).find('error').html('');
  var elt = $(this)
  $.ajax({
      type:"post",
      url:"{{url('/reset')}}",
      data:$('#reset_password_form').serialize(),
      success:function(data){
        var result = JSON.parse(data);
        if(result.result==0){
          result.message.forEach(function(object) { alert("result = 0");
            $('#general_modal .'+object.name).addClass('_error');
            $('#general_modal .'+object.name).attr('onkeyup','checkErrorRegister(this)');
            $('#general_modal .'+object.name).attr('data-original-title',object.message)
          });
          var elements =document.getElementsByClassName('error');
          elements[0].focus()
          $('[data-toggle="tooltip"]').tooltip({
            title: function(){
              return $(this).attr('data-original-title');
            }
          });
        }else{
					alert("result >0")
            $('#general_modal').modal('hide')
            $('.success_messages').html(result.response.message).addClass('show')
        }
        elt.find('button.confirm').removeClass('btn-loading');
      }
  });
})
function getNotifications(){
  if($('.notification_top ').hasClass('open') == false){
    $('.notification_top .user_dropdown ul').html('<li>Loading</li>')
    $.ajax({
      type:"post",
      url:"{{url('/account/getAccountNotifications')}}",
      data:'_token={{csrf_token()}}',
      success:function(data){
        var response = JSON.parse(data);
        if(response.first_five == 0)
          $('.notification_top .user_dropdown ul li').html('No new notifications')
        else{
          $('.notification_top .user_dropdown ul').html('')
          response.notifications.forEach(function(entry){
             var status ='';
             if(entry.viewed==1)
               status = 'viewed';
              else
                status = 'new';
             $('.notification_top .user_dropdown ul').append('<li class="'+status+'"><div>'+entry.message+'</div><small class="notification_date">'+entry.created_at+'</small></li>')
          });
          $('.notification_top .fa span').remove();
        }
          
      }
    })
  }  
}
			</script>
  </body>		
</html>