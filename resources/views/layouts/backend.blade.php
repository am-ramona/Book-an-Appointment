	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Doctors</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/material-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">		
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css')}}">
	<link href="{{ asset('css/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{ asset('css/open-iconic-bootstrap.css')}}" rel='stylesheet' />
	<link rel="stylesheet" href="{{ asset('css/styles.css')}}">
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('js/jquery.searchable.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/script.js')}}"></script>
	<script src="{{ asset('js/jscolor.js')}}"></script>
<!-- <link href='../fullcalendar.print.min.css' rel='stylesheet' media='print' /> -->
<script src="{{ asset('js/moment.min.js')}}"></script>
<script src="{{ asset('js/packery.pkgd.js')}}"></script>
<!-- <script src='../lib/jquery.min.js'></script> -->
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('js/fullcalendar.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-confirmation.js')}}"></script>
<script id="bootboxLib" src="{{ asset('js/bootbox.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-filestyle.js')}}"></script>
</head>

<body>
  <div class="container-fluid">
		<div class="row">
     @include('includes.backend_left_menu') 
		 @include('includes.backend_top_menu') 
      
		 @yield('content')
		 
        </div>
  </div>
</body>
		@yield('script')
<script type="text/javascript">	
	var url = "{{url('/')}}";
	
// 	function action(e, a){
//     $('#popup').modal('show');
//     if (a == "subscribe_renew") {

//       var id = $(e).data("id");
//       var package = $(e).data("package");
//       var variable = $(e).data("action");
//       var type = $(e).data("type");

//       $('#popup .modal-title').text("Confirm "+variable);
//       $('#popup .modal-body').text("Please confirm that you want to "+variable+" "+type+" for client ID "+id+".");

//       var status = 0;
//       if (variable == "unblock" || variable == "enable") { 
//         status = 1;
//       }
//       $('#popup .confirm').text(variable).attr('data-id',id).attr('data-status',status).attr('data-package',package).attr('data-action',"renew");
			
//     }else if (a == "status") {

//       var id = $(e).data("id");
//       var variable = $(e).data("action");
//       var type = $(e).data("type");

//       $('#popup .modal-title').text("Confirm "+variable);
//       $('#popup .modal-body').text("Please confirm that you want to "+variable+" "+type+" of ID "+id+".");

//       var status = 0;
//       if (variable == "unblock" || variable == "enable") { 
//         status = 1;
//       }
//       $('#popup .confirm').text(variable).attr('data-adminid',id).attr('data-status',status).attr('data-action',"blockadmin");;
//     }
// } 
	
// 			function bookschedule(day,hour){
// 				$.ajax({                    
//   				url: url+'/appointmentSchedule',     
//   				type: 'post', // performing a POST request
//   					data : {
// 							_token: '{{csrf_token()}}',
// 							"day": day,
// 							"hour": hour
// //    						data1 : 'value' // will be accessible in $_POST['data1']
// 						},
//   				success: function(data)         
// 					{
// 					 console.log("success");
// 					},
// 						error:function(data){
// 							console.log("failure");
// 						}
// 							})
// 		}
	
	function AddRangeMinValue(){
												var EventMinVal = $('.eDuration').map(function(){ return this.min;}).get(); 
												 $('<span id="EDurationValue">' + EventMinVal + ' m</span>').insertBefore('.eDuration');
   											$(document).on('input', '.eDuration', function() { $('#EDurationValue').html($(this).val() +' m');});
	}
	
	function resetValues(){
				$('.modal').on('hidden.bs.modal', function (e) {$('#EDurationValue').remove(); $("#EventName").css('border-color', '#F2F2F2'); 	$('#AddEventForm')[0].reset(); $("#check").css('box-shadow', 'none'); })			
	}
	
	function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}
	
// 	function addEvent(name, bgcolor){
				
// 				var eventsArray = [];
// 				var newEvent = [];

// 				newEvent[0] = name;
// 				newEvent[1] = new Date(); //got date string here exactly similar to the calendar's
// 				eventsArray.push(newEvent);

// 				var formattedEventData = [];
// 				for (var k = 0; k < eventsArray.length; k++) {
// 						formattedEventData.push({
// 								title: eventsArray[k][0],
// 								start: eventsArray[k][1]
// 						});
// 				}

// 				$('#calendar').fullCalendar({
// 						//eventsource: formattedEventData,
// 						events: formattedEventData,
// 						color: 'yellow',
// 						eventColor: bgcolor,
// 						textColor: 'black',
// 					  stick:true
// 				});
// 	}
	
	function SaveDroppedEventData(title, start, end){
					$.ajax({                    
  				url: url+'/SaveEventData',     
  				type: 'post', // performing a POST request
  					data : {
							_token: '{{csrf_token()}}',
							"title": title,
							"start": start,
							"end": end							
//    						data1 : 'value' // will be accessible in $_POST['data1']
						},
  				success: function(data)         
					{
					 console.log("success");
					},
						error:function(data){
							console.log("failure");
						}
							})
	}
	
		
// 		$(function () {
//     $("#eventType").keydown(function () { alert("keydown");
//         var search_keyword_value = $(this).val();
//         var dataString = 'search_keyword=' + search_keyword_value;
//         if (search_keyword_value != '') {
//             $.ajax({
//                 type: "POST",
//                 url: "/searching",
//                 data: dataString,
//                 cache: false,
//                 success: function (html) { console.log("success");
//                     $("#EventLiveSearch").html(html).show();
//                 },
// 							 error: function (html) { console.log("failure");
//                 },
							
//             });
//         }
//         return false;
//     });
// 		})
	/*
	function search_data(el){
 
        if (el != '') { 
					alert("value not empty");
					var data = 'q='+el+'&_token={{csrf_token()}}'
            $.ajax({
                type: "POST",
                url:"{{url('/searching')}}",
                data:data ,
                cache: false,
                success: function (data) { console.log("success");
										var result = JSON.parse(data);
										console.log(result.result.b);
										result.result.b.forEach( function(obj){
                    $("#eventLiveSearch").append("<div class=event_name" + obj.name + "");
										})
                },
							 error: function (data) { console.log("failure");
                },
							
            });
        }
        return false;
	}*/

//     $("#EventLiveSearch").live("click", function (e) {
//         var $clicked = $(e.target);
//         if (e.target.nodeName == "STRONG")
//             $clicked = $(e.target).parent().parent();
//         else if (e.target.nodeName == "SPAN")
//             $clicked = $(e.target).parent();
//         var $name = $clicked.find('.name').html();
//         var decoded = $("<div/>").html($name).text();
//         $('#eventType').val(decoded);
//     });

//     $(document).live("click", function (e) {
//         var $clicked = $(e.target);
//         if (!$clicked.hasClass("eventType")) {
//             $("#EventLiveSearch").fadeOut();
//         }
//     });

//     $('#eventType').click(function () {
//         $("#EventLiveSearch").fadeIn();
//     });
// 		})
	
// 	function loadScript( url, callback ) {
//   var script = document.createElement( "script" )
//   script.type = "text/javascript";
//   if(script.readyState) {  //IE
//     script.onreadystatechange = function() {
//       if ( script.readyState === "loaded" || script.readyState === "complete" ) {
//         script.onreadystatechange = null;
//         callback();
//       }
//     };
//   } else {  //Others
//     script.onload = function() {
//       callback();
//     };
//   }

//   script.src = url;
//   document.getElementsByTagName( "head" )[0].appendChild( script );
// }


// call the function...
// loadScript('{{ asset("js/script.js")}}', function() {
//   alert('script ready!'); 
// });
	


		</script>

</html>