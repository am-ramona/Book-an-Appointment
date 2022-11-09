@extends('layouts.outer')

@section('content')
<div id="loginFrontPage" class="container-fluid">
    <div class="row">
        <div id="loginForm" class="col-md-4 col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                           <strong class="loginTitle">Login to your Account</strong>
                </div>
                <div class="panel-body">
                    {{ Form::open(array('id' => 'login_form', 'role' => 'form', 'url' => 'dashboard')) }}
                        <div class="form-group">
                            <label for="InputNameEmail" class="control-label">User Name / Email:</label> 
														<!--  {{ Form::label('name', 'Name:') }} {{ Form::text('name', null, ['class' =>'form-control']) }} -->
                            <input name="email" class="form-control" id="InputNameEmail" placeholder="Email" >
													  <span class="error email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword" class="control-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password" >
												    <span class="error password_error"></span>
                        </div>
                        <div class="form-group">
                                <div class="checkbox">
                                    <label class="RememberMe">
                                        <input id="remember" name="remember" type="checkbox">Remember me on this computer</label>
                                </div>
                        </div>
                        <div class="form-group last">
	                            <button id="SignInButton" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">SIGN IN</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer ForgetPassword"><a class="forgot_password" href="javascript:void(0)">Forget Password?</a></div>
            </div>
        </div>
    </div>
</div>


<!-- {{ var_dump($errors) }} -->
<!-- @if ($errors -> any())
	<ul class="alert alert-danger">
		@foreach( $errors -> all() as $error)
		<li>{{ $error }}</li>		
		@endforeach
</ul> 
@endif -->
<!-- {{ Form::open(array('id' => 'login')) }}


{{ Form::close() }} -->
@endsection

@section('script')
<script>

$(document).ready(function(){
  $('#login_form').submit(function(ev){
    ev.preventDefault();
		$(".error").html("");
		
//     $('#SignInButton').addClass('btn-loading');
//     $('#login_errors').html('');
    $.ajax({
      type:"post",
      url:"{{url('/login')}}",
      data:$('#login_form').serialize(),
      success:function(data){
        var result = JSON.parse(data);
//         $('#SignInButton').removeClass('btn-loading');
        if(result.result==0){
          result.message.forEach(function(object) {
            $("."+object.name+"_error").html("* " + object.message[0]);
          })
          
// 					alert(errors); 
// 					console.log(Object.keys(result.message[0]));
// 					var parsed_result = JSON.parse(result.message);
				 
					
        } else {
          if(result.response.type=='success'){
            window.location = "{{url('/')}}"+result.response.intended_url
          } else {
// 						$('#login_form').find('.error').html(result.response.message).addClass('show')  
            alert("Incorrect email or password")
          }
        }
      }
    }); 
  })  
})

</script>
@endsection