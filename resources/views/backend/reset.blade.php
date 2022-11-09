@extends('layouts.outer')

@section('content')
<div class="body front">
  <div class="reset_password_form">
    <div class="reset_title _ftb">Reset Your Password</div>
    {{ Form::open(array('id'=>'resetlink','class'=> 'p-a-4')) }}
      <div class="rel">
        <input type="password"  class="ilimit_inpt password" name="password" id="" placeholder="New Password"  data-toggle="tooltip"/>
      </div>
      <div class="mt20 rel">
        <input type="password" class="ilimit_inpt password_confirmation" placeholder="Retype New Password"  name="password_confirmation"  data-toggle="tooltip"/>
      </div>
      <div class="mt20 ">
        <input type="hidden" name="token" value="{{$token}}">
        <button type="submit" id="register_btn" class="big green transition btn_anim"><span>Reset</span></button>
        
      </div>
    {{ Form::close() }}
  </div>
  
</div>

<script>
$(document).ready(function(){
    $('#resetlink').submit(function(ev){ 
      
        ev.preventDefault();
        $('#reset_btn span').addClass('btn-loading');
        $.ajax({
            type:"post",
            url:"{{url('/account/reset_submit')}}",
            data:$('#resetlink').serialize(),
            success:function(data){
              var result = JSON.parse(data);
              if(result.result==0){
                result.message.forEach(function(object) {
                  $('#resetlink .'+object.name).addClass('error');
                  $('#resetlink .'+object.name).attr('onkeyup','checkErrorRegister(this)');
                  $('#resetlink .'+object.name).attr('data-original-title',object.message)
                });
                var elements =document.getElementsByClassName('error');
                elements[0].focus()
                $('[data-toggle="tooltip"]').tooltip({
                  title: function(){
                    return $(this).attr('data-original-title');
                  }
                });
              }else{
                   window.location.href = '{{url("/home")}}';
              }
              $(elt).removeClass('btn-loading');
          }
        }); 
    })  
})
</script>
@endsection