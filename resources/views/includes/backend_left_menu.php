<div class="container" id="left-panel">
	<div class="row">
		<div class="wrapper">
    	    <div class="side-bar">
                <ul>
                    <li class="menu-head">
                      <img src="" alt="Clinic Logo" />
                    </li>
										<li class="menu" id="UserOptions">	
												<div class="UserAccess">
													<aside class="pull-left"><i id="ProfileImage" class="fa fa-user-circle" aria-hidden="true"></i></aside>
													<aside class="pull-left">
														 <span class="UserTitle">Secretary</span>
														 <ul class="list-inline" id="OptionsList">
															 <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
															 <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
															 <li><a href="#"><i class="fa fa-sign-out active" aria-hidden="true"></i></a></li>
														 </ul>
													</aside>
												</div>
												<ul id="UserPanel">
													<?php if ($active_nav == 'profile'){  ?>
													 <li><a href="../dashboard" class="{{$active_nav=='dashboard' ? 'active' : ''}}">Dashboard <i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>
                           <li><a href="../appointments" class="{{$active_nav=='appointments' ? 'active' : ''}}">Appointments<i class="fa fa-calendar-check-o pull-right" aria-hidden="true"></i></a></li>
                           <li><a href="../patients" class="{{$active_nav=='patients' ? 'active' : ''}}">Patients<i class="fa fa-users pull-right" aria-hidden="true"></i></a></li>
                           <li class="disabled"><a href="../billing" class="{{$active_nav=='billing' ? 'active' : ''}}">Billing <i class="fa fa-calendar pull-right" aria-hidden="true"></i></a></li>
													 <li class="disabled"><a href="../settings" class="{{$active_nav=='settings' ? 'active' : ''}}">Settings <i class="fa fa-cog pull-right" aria-hidden="true"></i></a></li>	
<?php }  else {?>
													 <li><a href="dashboard" class="{{$active_nav=='dashboard' ? 'active' : ''}}">Dashboard <i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>
                           <li><a href="appointments" class="{{$active_nav=='appointments' ? 'active' : ''}}">Appointments<i class="fa fa-calendar-check-o pull-right" aria-hidden="true"></i></a></li>
                           <li><a href="patients" class="{{$active_nav=='patients' ? 'active' : ''}}">Patients<i class="fa fa-users pull-right" aria-hidden="true"></i></a></li>
                           <li class="disabled"><a href="billing" class="{{$active_nav=='billing' ? 'active' : ''}}">Billing <i class="fa fa-calendar pull-right" aria-hidden="true"></i></a></li>
													 <li class="disabled"><a href="settings" class="{{$active_nav=='settings' ? 'active' : ''}}">Settings <i class="fa fa-cog pull-right" aria-hidden="true"></i></a></li>
													<?php } ?>
												</ul>
											</li>                  
                </ul>
    	    </div>   
		</div>
	</div>
</div>
<script>
$(document).ready(function(){	
    $(".push_menu").click(function(){
         $(".wrapper").toggleClass("active");
			   $("#left-panel").toggleClass("lessen");
		     $("#page, #top-panel").toggleClass("switch");
			   $(".push_menu i").toggleClass("fa-indent");
    });
	$("#UserPanel li a").click(function(){
		 $('#UserPanel li a').removeClass('active');
		 $(this).addClass("active");		
	})
});
</script>
