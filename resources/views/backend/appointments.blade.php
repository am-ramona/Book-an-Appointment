@extends('layouts.backend')

@section('content')

<div id="page" class="content clearfix ">
	<section id='CalendarAppointments' class="col-sm-12">
			<div class="col-xs-12 col-sm-8">
				<div id='calendar'></div>
<!-- 				<div id='calendar' onclick="action(this, 'CalendarModal')"></div> -->

				<div class="modal fade" id="general_modal" role="dialog">
    			<div class="modal-dialog">
            <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"></h4>
								<span class="modal-subtitle"></span>
								<div class="modal-subheading"></div>
							</div>
							<div class="modal-body tab-content">
								<div class="tab-pane fade in active" id="appointment">									
								<form action="">
									<div class="form-group FirstLine">
										<div class="row">
											<label class="col-sm-3 control-label">Appointment:</label>
											<div class="col-sm-9">
												<input type="" name="" class="form-control"></input>
											</div>
										</div>
									</div>
									<div class="form-group SecondLine">
										<div class="row">
											<label class="col-sm-3 control-label">Patient:</label>
											<div class="col-sm-9">
												<select class="selectpicker" name="PatientName" data-show-subtext="true" data-live-search="true">	@foreach($patients as $patient)<option data-subtext="">{{$patient->name}}</option>@endforeach</select>
											</div>
										</div>
									</div>
									<div class="form-group ThirdLine">
										<div class="row">
											<label class="col-sm-3 control-label">Duration:</label>
											<div class="col-sm-9">
												<input type="" name="" id="" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<div class="form-group FourthLine">
										<div class="row">
											<button class="cancel btn btn-default" type="button" data-dismiss="modal">Cancel</button>
											<button class="add btn btn-primary" type="submit" >Add</button>	
										</div>
									</div>
								</form>
							</div>
							  <div class="tab-pane fade" id="event">			
									<form action="">
										<div class="form-group FirstLine">
											<div class="row">
												<label class="col-sm-3 control-label">Event Type:</label>
												<div class="col-sm-9">
													<select class="selectpicker" name="EventType" data-show-subtext="true" data-live-search="true">	@foreach($types as $type)<option data-subtext="">{{$type->name}}</option>@endforeach</select>
												</div>
											</div>
										</div>
										<div class="form-group SecondLine">
											<div class="row">
												<label class="col-sm-3 control-label">Description:</label>
												<div class="col-sm-9">
													<input type="" name="" class="form-control" placeholder=""><!-- <span class="glyphicon glyphicon-search"></span> -->
												</div>
											</div>
										</div>
										<div class="form-group ThirdLine">
											<div class="row">
												<label class="col-sm-3 control-label">Duration:</label>
												<div class="col-sm-9">
													<input type="hidden" id="JsColorValue" name="jscolor" value="">
													<input type="" name="" class="form-control" placeholder="">
												</div>
											</div>
										</div>
											<div class="form-group FourthLine">
										<div class="row">
											<button class="cancel btn btn-default" type="button" data-dismiss="modal">Cancel</button>
											<button class="add btn btn-primary" type="submit" >Add</button>	
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
          </div>
 			  </div>
		
		    <div id="calendarModal" class="modal fade">
		    	<div class="modal-dialog">
   			  <div class="modal-content">
      	  <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
						<span class="modal-subtitle"></span>
						<div class="modal-subheading">
					  	<ul class="nav nav-pills">
								<li class="active">
									<a data-toggle="pill" href="#appointment" id="DisplayAppointmentData">Appointment</a>
								</li>
							</ul>
						</div>
       		 </div>
       			<div class="modal-body" id="modalBody">							
								<form action="">
									<div class="form-group FirstLine">
										<div class="row">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9">
												<input type="" name="" class="form-control"></input>
											</div>
										</div>
									</div>
									<div class="form-group SecondLine">
										<div class="row">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9">
												<select class="selectpicker" name="PatientName" data-show-subtext="true" data-live-search="true">	@foreach($patients as $patient)<option data-subtext="">{{$patient->name}}</option>@endforeach</select>
											</div>
										</div>
									</div>
									<div class="form-group ThirdLine">
										<div class="row">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9">
												<input type="" name="" id="" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<div class="form-group FourthLine">
										<div class="row">
											<button class="cancel btn btn-default" type="button" data-dismiss="modal">Cancel</button>
											<button class="add btn btn-primary" type="submit" >Add</button>	
										</div>
									</div>
								</form>
							</div>
						</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
      </div>
			<aside class="col-xs-12 col-sm-4">
				<div id='external-events'>
				<h4>Event Types</h4>
				<div class="EventsWrap">
					@foreach($types as $type) 
					<div class='fc-event' data-duration="00:30" style='background-color:  {{$type->color}}' data-color= '{{$type->color}}' data-event='{"title":"{{$type->name}}"}'>{{$type->name}}
					<span class="RemoveEvent"><i class="fa fa-times" aria-hidden="true"></i></span>
					</div>
					@endforeach
				</div>
				<script>
// 					var today = new Date();
//           var dd = today.getDate();
				</script>
<!-- 				<button id="AddNewEventButton" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#eventModal" onclick="AddRangeMinValue()">Add New Event Type</button> -->
						<button id="AddNewEventButton" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#eventModal">Add New Event Type</button>

				  <!-- Modal -->
				<div class="modal fade" id="eventModal" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content" id="AddEvent">
							{{ Form::open(array('id' => 'AddEventForm', 'role' => 'form')) }}
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title AddEventHeader">Add New Event Type</h4>
							</div>
							<div class="modal-body">						

									<div class="form-group FirstLine">
										<div class="row">
											<label class="col-sm-3 control-label">Name:</label>
											<div class="col-sm-9">
												<input type="text" name="name" id="EventName" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group SecondLine">
										<div class="row">
											<label class="col-sm-3 control-label">Description:</label>
											<div class="col-sm-9">
												<input type="text" name="EventDescription" id="EventDescription" class="form-control" placeholder=""><!-- <span class="glyphicon glyphicon-search"></span> -->
											</div>
										</div>
									</div>
<!-- 									<div class="form-group ThirdLine">
										<div class="row">
											<label class="col-sm-3 control-label">Duration</label>
											<div class="col-sm-9">
												<input type="range" name="eventDuration" class="eDuration" class="form-control" placeholder="" min="15" max="45" value="15" step="15">
											</div>
										</div>
									</div> -->
									<div class="form-group ThirdLine"><div class="row"><label class="col-sm-3 control-label">Event Class:</label>
				<div class="col-sm-9">
				<div class="EventClassColors"><ul class="list-unstyled clearfix">
				<li><input type="radio" name="eventClassColor" data-toggle="tooltip" id="eventClassPinkColor" value="1" data-color="#EE6352" checked><label for="eventClassPinkColor"></label><div class="check"></div></li>
				<li><input type="radio" name="eventClassColor" id="eventClassGreyColor" value="2" data-color="#425D6E"><label for="eventClassGreyColor"></label> <div class="check"><div class="inside"></div></div></li>
				<li><input type="radio" name="eventClassColor" id="eventClassGreenColor" value="3" data-color="#87BBA2"><label for="eventClassGreenColor"></label> <div class="check"><div class="inside"></div></div></li>
				<li><input type="radio" name="eventClassColor" id="eventClassPurpleColor" value="4" data-color="#7F7CAF"><label for="eventClassPurpleColor"></label> <div class="check"><div class="inside"></div></div></li>
				<li><input type="radio" name="eventClassColor" id="eventClassPurpleLightColor" value="5" data-color="#d9d9ff" ><label for="eventClassPurpleLightColor"></label> <div class="check"><div class="inside"></div></div></li>
        <li id="ColorPickerItem" onclick="changeZindex(this,10)"><input type="radio" name="eventClassColor" id="eventClassSelectColor" value="" data-color="#000000">
					<label for="eventClassSelectColor"></label> 
					<div class="check" id="check">
<!-- 						<input class="jscolor {closable:true,closeText:'Close me!'}" value="ff3300"> -->
<!-- 						  <input class="jscolor {closable:true,closeText:'Close me!'}" value="" data-toggle="tooltip" onchange="update(this.jscolor)" > -->
						<button id="colorPickerButton" class="jscolor {valueElement:null,value:'66ccff',closable:true, closeText:'Close me!', onFineChange:'update(this)'}" data-toggle="tooltip"></button>
						<div class="inside"></div>
					</div>
				</li>
					<li><input type="hidden" id="hiddenJsColorValue" name="jscolor" value=""></li>
				</div>
					</div>
										</div>
										</div>

							</div>

							<div class="modal-footer">
								<button class="cancel btn btn-default" type="button" data-dismiss="modal" onclick="resetValues()">Cancel</button>
								<button class="add btn btn-primary" type="submit">Add</button>						
							</div>
							         {{ Form::close() }}
						</div>

					</div>
				</div>
				</div>
			</aside>
    </div>
<!-- 			<aside class="col-xs-12 col-sm-4">
				<div id="AddAppointments">
        <div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Add Appointment</span>
					</div>
					<form action="" class="panel-body">
						<div class="form-group panel-block">
							<div class="row">
								<label class="col-sm-3 control-label">Appointment Type:</label>
								<div class="col-sm-9">
									<input type="text" name="appointmentType" class="form-control"></i>
								</div>
							</div>
						</div>
						<div class="form-group panel-block">
							<div class="row">
								<label class="col-sm-3 control-label">Patient:</label>
								<div class="col-sm-9">
									<input type="email" name="patientName" class="form-control" placeholder="Please choose/ add a Patient">
									<i class="fa fa-search" id="searchPatients" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						<div class="form-group panel-block">
							<div class="row">
								<label class="col-sm-3 control-label">Date & Time:</label>
								<div class="col-sm-9">
									<input type="email" name="dateTime" class="form-control" placeholder="Please choose Date & Time">
								</div>
							</div>
						</div>
					</form>
					<div class="panel-footer text-right">
						<button id="cancel" type="button" class="btn btn-default">Cancel</button>
						<button id="add" type="submit" class="btn btn-primary">Add</button>						
					</div>
				</div>
				</div>
			</aside> -->

	  
		  <div style='clear:both'></div>
  	</section>
</div>

<script>
	$(document).ready(function() {
// 		    var m = checkEventTypeId('app');
//     		console.log(m);
// 		$('[data-toggle="tooltip"]').tooltip();   
		initCalendar();
		adjustEventTypesColors();
// 		addEvent("makeup", "purple");
		/* initialize the external events
		-----------------------------------------------------------------*/	
	$('#AddEventForm').submit(function(ev){ 
	
    ev.preventDefault();
    $.ajax({
      type:'post',
      url:"{{url('/events')}}",
      data:$('#AddEventForm').serialize(),
			cache: false,
      success:function(data){

				var result = JSON.parse(data);
				if(result.result==0){
          $("#EventName").css('border-color', 'red');
				} else {
// 							if (($('#hiddenJsColorValue').val()) != ''){ 
// 											alert("hidden value not null");
// 								      var hiddenValueColor = $('#hiddenJsColorValue').val();
// // 					            saveNewColor(hiddenValueColor);
// 										  $.ajax({
// 												type:'post',
// 												url:"{{url('/addNewColor')}}",
// 												data : {
// 																	_token: '{{csrf_token()}}',
// 																	"color": hiddenValueColor						
// 												},
// 												cache: false,
// 											  success: function(data){console.log("success");}
// 										 });
// 				       	}
           var $eventName = $("#EventName").val(),
						$eventColor = $('input[name="eventClassColor"]:checked').data('color');

					$(".EventsWrap").append('<div class="fc-event ui-draggable ui-draggable-handle" data-duration="00:30" style="background-color:' + $eventColor +'" data-color="' + $eventColor +'" >' + $eventName + '<span class="RemoveEvent" onclick="Remove(this);"><i class="fa fa-times" aria-hidden="true"></i></span></div>');
					$(".fc-event.ui-draggable.ui-draggable-handle:last-child").attr('data-event','{"title":"'+$eventName+'"}');
					initCalendar();
					$('#eventModal').modal('hide');
					$('#AddEventForm')[0].reset();
					$("#hiddenJsColorValue").val('');
					

			 }
      },
		 error: function () {
			 $("#EventName").css('border-color', 'red');
			}
    }); 
  })  		
	$(".RemoveEvent").click(function(){
    Remove(this);
});
		
})
	
	function checkEventTypeId(ev, callback){
// 	alert(ev);
	var data = 'eventtitle='+ev+'&_token={{csrf_token()}}'
	  $.ajax({
      type:'post',
      url:"{{url('/getEventId')}}",
      data:data,
			cache: false,
			success: function(data){
						result = JSON.parse(data); 
//   				       alert(result.result);
// 					alert(result.eventTypeId.eventType_id);
									if(result.result==0){
								} else { 									 
               window.eventTypeId = result.eventTypeId.eventType_id;
												      
//  				      console.log(eventTypeId);
									callback(eventTypeId);
			}

			
		}
		});
		}
// 		   return eventTypeId;

function checkEventTypeId_success(data) {
	 console.log(data);
    return data;
}	
		
function initCalendar(){
		$('#external-events .fc-event').each(function() {
			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true, // maintain when user navigates (see docs on the renderEvent method)
				color: $(this).data('color')
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
						
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

// 			$( "#draggable" ).draggable();

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
    	navLinks: true, // can click day/week names to navigate views
 			editable: true,
// 			eventResize: function(event, delta, revertFunc) {
//         alert(event.title + " end is now " + event.end.format());
//         if (!confirm("is this okay?")) {
//             revertFunc();
//         }
// 			},
			timeFormat: 'hh:mm',
			events: [ 
				<?php 
				foreach($events as $e) { 
							$time = strtotime($e->time);
							$end = $time + $e->duration; 
// 					date_format($end,"Y/m/d H:i:s");
// 					$endtime = date_format($end,"Y/m/d H:i:s");

							$endtime = date("H:i", strtotime('+'.$e->duration.' minutes', $time));
// 					print_r($endtime); exit;
				?>
				{
					title: '<?php echo $e->name ?>',
 				  start:'<?php echo $e->date."T".$e->time ?>',
// 					 start  : '2017-08-24T12:30:00',
					end:  '<?php echo $e->date."T".$endtime.":00" ?>',
					backgroundColor: '<?php echo $e->color ?>'
				},
			<?php	}
						?>
				
					<?php 
				foreach($appointments as $ap) {
							$time = strtotime($ap->time);
							$end = $time + $ap->duration; 
// 					date_format($end,"Y/m/d H:i:s");
// 					$endtime = date_format($end,"Y/m/d H:i:s");

							$endtime = date("H:i", strtotime('+'.$ap->duration.' minutes', $time));
// 					print_r($endtime); exit;
				?>
				{
					title: '<?php echo $ap->name ?>',
 				  start:'<?php echo $ap->date."T".$ap->time ?>',
// 					 start  : '2017-08-24T12:30:00',
					end:  '<?php echo $ap->date."T".$endtime.":00" ?>',
					backgroundColor: '#29ABE2'
				},
			<?php	}
						?>
			],
			defaultView: 'agendaDay',
			slotDuration: '00:15:00',
			dayClick: function(date, jsEvent, view) {
//  				 console.log(date._d);
				if(view.type=='month'){
					$('#calendar').fullCalendar('changeView', 'agendaDay', date);
				}else{
							Openmodal(date,this, 'CalendarModal');					
				}
// 			bookschedule(date.format('YYYY-MM-DD'),date.format('HH:00'));
				
				},
			eventClick:  function(event, jsEvent, view) {
				
					var data = 'eventtitle='+event.title+'&_token={{csrf_token()}}'
	  			$.ajax({
      			type:'post',
     				url:"{{url('/getEventId')}}",
      			data:data,
						cache: false,
						success: function(data){
						result = JSON.parse(data); 
//   				       alert(result.result);
// 					alert(result.eventTypeId.eventType_id);
									if(result.result==0){
								} else { 									 
              var eventTypeId = result.eventTypeId.eventType_id;
							if (eventTypeId == '80') {			
							$('#appointment').addClass('active in');
							$('#event').removeClass('active in');
							$('#general_modal #appointment .ThirdLine .form-control').attr({'type': 'range', 'name':'AppointmentDuration', 'id':'AppointmentDuration', 'min':'15', 'max':'45', 'value':'15', 'step' : '15'});
						  var minValue = $('#AppointmentDuration').map(function(){ return this.min;}).get();
							$('<span id="AppointmentDurationValue">' + result.eventTypeId.duration + ' m</span>').insertBefore("#AppointmentDuration");
						  $('#general_modal #appointment form').attr({ 'id': 'UpdateAppointment', 'autocomplete': 'off', 'onsubmit':'UpdateAppointment(event, newtime, newdate)'});
							$('#general_modal #appointment .FirstLine .form-control').attr({'type': 'text', 'name':'name', 'id':'AppointmentTitle', 'value':event.title});
							$('#general_modal #appointment .SecondLine .selectpicker').find(".filter-option").html(result.patientName[0].name);
							$('#general_modal #appointment .ThirdLine #AppointmentDuration').val(result.eventTypeId.duration);
							$(".delete").click(function(){ 
								var data =  'status=0&_token={{csrf_token()}}'
   								$.ajax({
      							type:'post',
     								url:"{{url('/DeleteAppointment')}}",
      							data:data,
										cache: false,
										success: function(data){
											result = JSON.parse(data); 
//   				       alert(result.result);
// 					alert(result.eventTypeId.eventType_id);
								  		if(result.result==0){
												} else { 		}							 
										}
								});
							})
						}
									
									
									else { var data = 'eventtitle='+event.title+'&_token={{csrf_token()}}'
											$.ajax({
      			type:'post',
     				url:"{{url('/getEventData')}}",
      			data:data,
						cache: false,
						success: function(data){
						result = JSON.parse(data); 

									if(result.result==0){
								} else { 		}										
									}
												      
//  				      console.log(eventTypeId);
			}	);		
		 }
								}
						}
		});
				
// 				var m = checkEventTypeId(event.title, checkEventTypeId_success);
// 				alert(m);
// 				alert(data);
// 				var promise = checkEventTypeId(event.title);
// 		OnSuccess(promise);
// 	          checkEventTypeId(event.title, function(output) {
//                alert(eventTypeId); return eventTypeId;
//              });

// 				console.log(m);

// 				var m = checkEventTypeId(event.title, );
// 				console.log(m);
//  				alert(event.title);
// 				if (checkEventTypeId(event.title) == 'yes') alert("youpi yes");
            $('#modalTitle').html(event.title);
				var date = event.start;
					HourMinTime = date.format('HH:mm A'),		
		      DayMonthYearTime =  date.format('dddd, MMM DD, YYYY');
				    $('.modal-title:not(.AddEventHeader)').html(HourMinTime);
						$('.modal-subtitle').html(DayMonthYearTime);
						$('.modal-subheading').html();
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
// 				console.log(event);

							$('#appointment').removeClass('active in');
							$('#event').addClass('active in');
              $('#general_modal #event .ThirdLine .form-control').attr({'type': 'range', 'name':'eventDuration', 'id':'eventDuration', 'min':'15', 'max':'45', 'value':'15', 'step' : '15'});
							var EventMinValue = $('#eventDuration').map(function(){ return this.min;}).get();
							$('<span id="EventDurationValue">' + EventMinValue + ' m</span>').insertBefore("#eventDuration");	
				      $('#general_modal #event form').attr({ 'id': 'UpdateEvent', 'autocomplete': 'off', 'onsubmit':'UpdateEvent(event, newtime, newdate)'});
							$(document).on('input', '#eventDuration', function() { $('#EventDurationValue').html($(this).val() +' m');});


			      	$(document).on('input', '#AppointmentDuration', function() { $('#AppointmentDurationValue').html($(this).val() +' m');});				  			
						  $('#general_modal .modal-subheading').addClass("DisplayAppointmentDataTitle").html( '<ul class="nav nav-pills"><li class="active"><a data-toggle="pill" href="#appointment" id="DisplayAppointmentData" style="background-color:'+event.backgroundColor+'">'+event.title+'</a></li></ul>');
              $('#general_modal').modal();
// 				    $(".add").css({"background-color": event.backgroundColor, "border-color": event.backgroundColor});
// 					  $(".cancel").css({ "border-color": event.backgroundColor, "color": event.backgroundColor});
					  $( ".add" ).removeClass('add').addClass('update').html('Update');
			    	$( ".cancel" ).removeClass('cancel').addClass('delete').html('Delete');
				    $(".update").css({"background-color": "#00a6e0", "border-color": "#00a6e0"});
 		    		$(".delete").css({"border-color": "#00a6e0", "color":"#00a6e0"});
//             $( ".cancel" ).removeClass('cancel').addClass('delete').html('Delete');


						$('#general_modal').on('hidden.bs.modal', function (e) {$('.modal-subheading').html('');
																																		$( ".update" ).removeClass('update').addClass('add').html('Add');
																																		$(".add").css({"background-color": "#00a6e0", "border-color":"#00a6e0"});
																																		$( ".delete" ).removeClass('delete').addClass('cancel').html('Cancel');
																																		$(".cancel").css({ "border-color": "#00a6e0", "background-color":"#ffffff", "color":"#00a6e0"});
																																		$('#AppointmentDurationValue').remove();
																															    	$('#EventDurationValue').remove();
																																		$('#AppointmentDuration, #eventDuration').val(15);

																																		
// 																																$('#EventDurationValue').remove();
// 																																$('#general_modal .modal-title').removeClass("calendarTime");
// 																																$('#general_modal .modal-subtitle').removeClass("calendarDate");
// 																																$('#general_modal .modal-subheading').removeClass("appointmentEventTab");
// 																																$("#general_modal #appointment .FirstLine .form-control").next().remove();
// 																																$("#general_modal #appointment .SecondLine .form-control").next().remove();
// 																															  $("#general_modal #event .FirstLine .form-control").next().remove();
																															 })		
// 				 var similarEvents = $("#calendar").fullCalendar('clientEvents', function(e) { return e.test === event.test });
// 				event.className = 'reg_selected';
        
//         for (var i = 0; similarEvents.length > i ; i++){
//                 similarEvents[i].className = 'reg_selected';
//                 $('#calendar').fullCalendar('updateEvent', similarEvents[i]);
//             }
// 				console.log(event.start._d);
        },
			 eventOverlap: false,

			droppable: true, // this allows things to be dropped onto the calendar
			drop: function(date, jsEvent,ui) {
					console.log(ui);
// 				alert("Dropped on " + date.format());
		
// 				console.log(jsEvent);
				var view = $('#calendar').fullCalendar('getView');
				if(view.type=='month'){
// 					moment.duration(45, "minutes");console.log(moment.duration(45, "minutes"));
					$('#calendar').fullCalendar('changeView', 'agendaDay', date.format('YYYY-MM-DD'));			
				}
				
	//			$(this).remove();
// 				console.log(date.format());
// 					console.log(jsEvent.target.style.backgroundColor);
// 					 var bgColor = ui.helper[0].style.backgroundColor;
//         $(this).css('backgroundColor', bgColor);
				
// 				jsEvent.backgroundColor = "#666666";
				},
		
// 			 var bgColor = $(ui.draggable).css('backgroundColor');
//         $(this).css('backgroundColor', bgColor);
// eventColor: 'pink',
			eventReceive: function(Event){ 
// 			console.log(Event.end._d);
				 SaveDroppedEventData(Event.title, Event.start._d, Event.end._d);
				
// 					var dataToStart = moment(event.start).format("YYYY-MM-DD");
// 				alert(dataToStart);
				
// 				var timeToStart = moment(event.start).format("hh:mm:ss a");
// 								alert(timeToStart);

			},
			
// 						eventRender: function (event, element) {
// 					var dataToStart = moment(event.start).format("YYYY-MM-DD");
// 			console.log(dataToStart);
// 				}
		});	
	}
	
	// 	 window.AddNewAppointment = function() {

function AddNewAppointment(ev, time, date){ 
// console.log(time);
   ev.preventDefault();
	 var newAppointmentData = $('#AddAppointment').serialize();
	 var data = newAppointmentData+'&time='+time+'&date='+date+'&_token={{csrf_token()}}'
	
    var name = $('#AppointmentTitle').val(),
				duration = $('#AppointmentDuration').val(),
				duration = '00:'+duration+':00',
        start = time,
	      endtime = addTimes(start, duration);
				
    $.ajax({
      type:'post',
      url:"{{url('/addAppointment')}}",
      data:data,
			cache: false,
      success:function(data){
							var result = JSON.parse(data);
								if(result.result==0){
									$("#AppointmentTitle").css('border-color', 'red');
								} else { 
									$('#general_modal').modal('hide');
									calendar = $("#calendar").fullCalendar({ events: initCalendar.events });
									events = [ { title  : name, start  : date+"T"+time, end : date+"T"+endtime, backgroundColor: '#29ABE2' } ];
									calendar.fullCalendar('addEventSource', events);
									calendar.fullCalendar('refetchEvents');
// 									initCalendar();
// 									alert("to add");

							 }
      },
		 error: function () {
			 			   $("#AppointmentTitle").css('border-color', 'red');
			}
    }); 

			}
function AddNewEvent(ev, time, date){
		
	 ev.preventDefault();
	 var newEventData = $('#AddEvent').serialize();
	 var data = newEventData+'&time='+time+'&date='+date+'&_token={{csrf_token()}}'
	 
	     var name = $('#AddEvent .btn.selectpicker').attr('title'),
				duration = $('#eventDuration').val(),
				duration = '00:'+duration+':00',
        start = time,
	      endtime = addTimes(start, duration);
	
    $.ajax({
      type:'post',
      url:"{{url('/addEvent')}}",
      data:data,
			cache: false,
      success:function(data){
							result = JSON.parse(data);
// 				       console.log(result.bgcolor[0].color);
								if(result.result==0){
// 									$("#AppointmentTitle").css('border-color', 'red');
								} else { 
									$('#general_modal').modal('hide');
									calendar = $("#calendar").fullCalendar({ events: initCalendar.events });
									events = [ { title  : name, start  : date+"T"+time, end : date+"T"+endtime, backgroundColor: result.bgcolor[0].color } ];
									calendar.fullCalendar('addEventSource', events);
									calendar.fullCalendar('refetchEvents');
									
// 									initCalendar();
// 									alert("to add");
							 }
      },
		 error: function () {
// 			 			   $("#AppointmentTitle").css('border-color', 'red');
			}
    }); 
		
		
	}
//    console.log(result.bgcolor[0].color);	
function addTimes (start, duration){

  var a = start.split(":");
 var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
 var b = duration.split(":");
 var seconds2 = (+b[0]) * 60 * 60 + (+b[1]) * 60 + (+b[2]); 

 var date = new Date(1970,0,1);
     date.setSeconds(seconds + seconds2);

 var c = date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
 return c;
	}
function Openmodal(date, e, a){
//  	alert(date._d);
		$('#general_modal').modal('show');
		
		$('#general_modal .modal-title').text('').addClass('');
		$('#general_modal .modal-subtitle').text('').addClass('');
	  $('#general_modal .modal-subheading').addClass('').empty();
		$('#general_modal .tab-content>.tab-pane').attr('id', '');
	  $('#general_modal .tab-content .tab-pane:nth-child(2)').attr('id', '');
		$('#general_modal .FirstLine label').text('');
		$('#general_modal .SecondLine label').text('');
		$('#general_modal .ThirdLine label').text('');
		$('#AppointmentDurationValue').remove();
//     $('#general_modal').on('hidden.bs.modal', function (e) {$('#general_modal .ThirdLine').next().remove();})

		
	  if (a == 'CalendarModal') {
					HourMinTime = date.format('HH:mm A'),		
		      DayMonthYearTime =  date.format('dddd, MMM DD, YYYY');
			    newdate =  date.format('Y-MM-DD');
		    	newtime = date.format('HH:mm:ss');
// 			console.log(date);
// 	 SubmitDate = date._d;

      $('#general_modal .modal-title').text(HourMinTime).addClass("calendarTime");
			$('#general_modal .modal-subtitle').text(DayMonthYearTime).addClass("calendarDate");
			$('#general_modal .modal-subheading').addClass("appointmentEventTab").append( '<ul class="nav nav-pills"><li class="active"><a data-toggle="pill" href="#appointment" id="AppointmentTab">Appointment</a></li><li><a data-toggle="pill" href="#event" id="EventTab">Event</a></li></ul>');
      $('#general_modal .tab-content>.tab-pane').attr('id', 'appointment');
			$('#general_modal .tab-content .tab-pane:nth-child(2)').attr('id', 'event');													
// 			$('<i class="fa fa-search search" id="searchAppointments" aria-hidden="true"></i>').insertAfter("#general_modal #appointment .FirstLine .form-control");
// 			$('<i class="fa fa-search search" id="searchPatients" aria-hidden="true"></i>').insertAfter("#general_modal #appointment .SecondLine .form-control");
			$('#general_modal #appointment .FirstLine .form-control').attr({'type': 'text', 'name':'name', 'id':'AppointmentTitle'});				
			$('#general_modal #appointment .SecondLine .form-control').attr({'type': 'text', 'placeholder':'Please choose'});
			$('#general_modal #appointment .ThirdLine .form-control').attr({'type': 'range', 'name':'AppointmentDuration', 'id':'AppointmentDuration', 'min':'15', 'max':'45', 'value':'15', 'step' : '15'});
			$('#general_modal #appointment .FirstLine label').text("Appointment:");
			$('#general_modal #appointment .SecondLine label').text("Patient:");
			$('#general_modal #appointment .ThirdLine label').text("Duration:");
			var minValue = $('#AppointmentDuration').map(function(){ return this.min;}).get();
			$('<span id="AppointmentDurationValue">' + minValue + ' m</span>').insertBefore("#AppointmentDuration");
   		$(document).on('input', '#AppointmentDuration', function() { $('#AppointmentDurationValue').html($(this).val() +' m');});
			
			$('#general_modal #appointment form').attr({ 'id': 'AddAppointment', 'autocomplete': 'off', 'onsubmit':'AddNewAppointment(event, newtime, newdate)'});
			$('#general_modal #event form').attr({ 'id': 'AddEvent', 'autocomplete': 'off', 'onsubmit':'AddNewEvent(event, newtime, newdate)'});
			// 			$('#general_modal #event .SecondLine .form-control').attr({'type': 'text', 'name':'PatientName', 'id':'PatientName'});
// 			$('#general_modal #event .ThirdLine .form-control').attr({'type': 'range', 'name':'eventDuration', 'id':'eventDuration'});
			$('#general_modal #event .FirstLine label').text("Event Type:");
			$('#general_modal #event .SecondLine label').text("Description:");
			$('#general_modal #event .ThirdLine label').text("Duration:");
// 			$('<i class="fa fa-search search" id="searchAddEvent" aria-hidden="true"></i>').insertAfter("#general_modal #event .FirstLine .form-control");
// 			$('#general_modal #event .FirstLine .form-control').replaceWith('<select class="selectpicker" data-show-subtext="true" data-live-search="true">	<option data-subtext="Rep California"></option></select>');		
// 			$('#general_modal #event .FirstLine .form-control').replaceWith('<select class="selectpicker" data-show-subtext="true" data-live-search="true"><option data-subtext="Rep California">toni</option><option data-subtext="Rep California">toni</option></select>');		
//       $("#general_modal #event .FirstLine").append("var script = document.createElement( 'script' );script.type = 'text/javascript';script.src = {{ asset('js/bootstrap-select.min.js')}};")
// 			var script = document.createElement( 'script' );
// script.type = 'text/javascript';
// script.src = '{{ asset('js/bootstrap-select.min.js')}}';
// $("#general_modal #event .FirstLine .selectpicker").after( script );
// 			$('#general_modal #event .FirstLine .form-control').attr({'type': 'text', 'name':'eventType', 'id':'eventType','placeholder':'Please choose / add Event',  'onkeyup':'search_data(this.value)'});		
			$('<div id="eventLiveSearch"></div>').insertAfter("#eventType");
			$('#general_modal #event .FirstLine .form-control').attr({'type': 'text', 'id':'event_name', 'placeholder':'Please choose'});
			$('#general_modal #event .SecondLine .form-control').attr({'type': 'text', 'name':'description', 'id':'eventDescription'});
			$('#general_modal #event .ThirdLine .form-control').attr({'type': 'range', 'name':'eventDuration', 'id':'eventDuration', 'min':'15', 'max':'45', 'value':'15', 'step' : '15'});
// 			$('<div class="form-group FourthLine"><div class="row"><label class="col-sm-3 control-label">Event Class: *</label>' +
// 				'<div class="col-sm-9">'+
// 				'<div class="EventClassColors"><ul class="list-unstyled clearfix">'+
// 				'<li><input type="radio" name="eventClassColor" id="eventClassPinkColor" value="1" checked><label for="eventClassPinkColor"></label><div class="check"></div></li>'+
// 				'<li><input type="radio" name="eventClassColor" id="eventClassGreyColor" value="2" ><label for="eventClassGreyColor"></label> <div class="check"><div class="inside"></div></div></li>'+
// 				'<li><input type="radio" name="eventClassColor" id="eventClassGreenColor" value="3" ><label for="eventClassGreenColor"></label> <div class="check"><div class="inside"></div></div></li>'+
// 				'<li><input type="radio" name="eventClassColor" id="eventClassPurpleColor" value="4" ><label for="eventClassPurpleColor"></label> <div class="check"><div class="inside"></div></div></li>'+
// 				'<li><input type="radio" name="eventClassColor" id="eventClassPurpleLightColor" value="5" ><label for="eventClassPurpleLightColor"></label> <div class="check"><div class="inside"></div></div></li>'+
// 				'</div></div></div></div>').insertAfter("#general_modal #event .ThirdLine");
			  var EventMinValue = $('#eventDuration').map(function(){ return this.min;}).get();
			 $('<span id="EventDurationValue">' + EventMinValue + ' m</span>').insertBefore("#eventDuration");
   		$(document).on('input', '#eventDuration', function() { $('#EventDurationValue').html($(this).val() +' m');});
			
				$('#general_modal').on('hidden.bs.modal', function (e) {$('#AppointmentDurationValue').remove();
																																$('#EventDurationValue').remove();
																																$('#general_modal .modal-title').removeClass("calendarTime");
																																$('#general_modal .modal-subtitle').removeClass("calendarDate");
																																$('#general_modal .modal-subheading').removeClass("appointmentEventTab");
																																$("#general_modal #appointment .FirstLine .form-control").next().remove();
																																$("#general_modal #appointment .SecondLine .form-control").next().remove();
																															  $("#general_modal #event .FirstLine .form-control").next().remove();
																																$("#AppointmentTitle").css('border-color','#F2F2F2');
																																$('#AppointmentDuration, #eventDuration').val(15);
																															
// 																																$('#appointment').addClass('active in');
// 																																$('#event').addClass('active in');
																															 })			
    																													}
		else if (a=='eventModal'){ 	
			$('#general_modal .modal-title').text('Add New Event').addClass('AddEventHeader');
			$('#general_modal .FirstLine label').text('Name');
			$('#general_modal .SecondLine label').text('Description');
			$('#general_modal .ThirdLine label').text('Duration');
			$('#general_modal form').attr('id', 'AddEventForm');
 			$('#general_modal .tab-content').attr('id', 'event');
			$('#general_modal .ThirdLine .form-control').attr({'type': 'range', 'name':'EventDuration', 'id':'Duration', 'min':'15', 'max':'45', 'value':'15', 'step' : '15'});
			$('<div class="form-group FourthLine"><div class="row"><label class="col-sm-3 control-label">Event Class: *</label>' +
				'<div class="col-sm-9">'+
				'<div class="EventClassColors"><ul class="list-unstyled clearfix">'+
				'<li><input type="radio" name="eventClassColor" id="eventClassPinkColor" value="1" checked><label for="eventClassPinkColor"></label><div class="check"></div></li>'+
				'<li><input type="radio" name="eventClassColor" id="eventClassGreyColor" value="2" ><label for="eventClassGreyColor"></label> <div class="check"><div class="inside"></div></div></li>'+
				'<li><input type="radio" name="eventClassColor" id="eventClassGreenColor" value="3" ><label for="eventClassGreenColor"></label> <div class="check"><div class="inside"></div></div></li>'+
				'<li><input type="radio" name="eventClassColor" id="eventClassPurpleColor" value="4" ><label for="eventClassPurpleColor"></label> <div class="check"><div class="inside"></div></div></li>'+
				'<li><input type="radio" name="eventClassColor" id="eventClassPurpleLightColor" value="5" ><label for="eventClassPurpleLightColor"></label> <div class="check"><div class="inside"></div></div></li>'+
				'</div></div></div></div>').insertAfter("#general_modal .ThirdLine");
// 			var EventMinValue = $('#eventDuration').map(function(){ return this.min;}).get();
// 			$('<span id="EventDurationValue">' + EventMinValue + ' m</span>').insertBefore("#eventDuration");
//    		$(document).on('input', '#eventDuration', function() { $('#EventDurationValue').html($(this).val() +' m');});
		 }
			$('#general_modal').on('hidden.bs.modal', function (e) {$('#AppointmentDurationValue').remove();
																																$('#EventDurationValue').remove();
																																$('#general_modal .modal-title').removeClass("AddEventHeader");
																																$('#general_modal .modal-subtitle').removeClass("calendarDate");
																																$('#general_modal .modal-subheading').removeClass("appointmentEventTab");
																															 	$('#general_modal .tab-content').attr('id', '');

				 })			
		
	}	
function Remove(e){
			var eventName = $(e).parent().data('event').title;
			var event = $(e).parent();
// 			alert(eventName);
				$.ajax({                    
  				url: url+'/RemoveEventType',     
  				type: 'post', // performing a POST request
  					data : {
							_token: '{{csrf_token()}}',
							name:eventName
					
//    						data1 : 'value' // will be accessible in $_POST['data1']
						},
  				success: function(data)         
					{
					  event.css('display', 'none');
					},
						error:function(data){
							
						}
							})
			
			
		}
function update(jscolor) {
    document.getElementById('check').style.boxShadow = '0px 0px 0px 2px #' + jscolor;
		var dataColor = document.getElementById('eventClassSelectColor').getAttribute('data-color');
    document.getElementById('eventClassSelectColor').setAttribute('data-color', '#' + jscolor);  
		document.getElementById("hiddenJsColorValue").value = '#'+jscolor;
}
function changeZindex(a, b){ 
			$(a).find("#check").css("zIndex", b);
		  document.getElementById('colorPickerButton').jscolor.show();
	}
function adjustEventTypesColors(){
		   $('.EventClassColors li:not("#ColorPickerItem")').click(function(e){ 
				 	$('#ColorPickerItem').find("#check").removeAttr("style");
    		});		
	}
	
</script>
@endsection