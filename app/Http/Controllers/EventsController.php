<?php

namespace App\Http\Controllers;
use App\User;
use App\EventTypes;
use App\classColors;
use App\Events;
use App\Patients;
use App\Appointments;
use \Auth;
use Mail;
use DB;
use DateTime;
// use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;

class EventsController extends BaseController
{	
	 public function appointments(){
		  if(Auth::check()){
				$types = EventTypes::getAllEventTypes(); 
				$events = Events::getdroppedEvents();
				$patients = Patients::getAllPatients();
				$appointments = Appointments::getAllAppointments();
				$newColor = classColors::getTypesNewColors();
				$active_nav = 'appointments';
// 			var_dump($events);exit;
//  			 if (is_object($events)) {echo'<script>alert("types object")</script>';} else if (is_array($types)){echo'<script>alert("types array")</script>';}
				return view('backend.appointments')->with(compact('active_nav','types', 'events', 'patients', 'appointments'));
				
			} else return Redirect::to('login');	 
		 
  }
// 	 public function appointmentSchedule(){
	 
// 		 	 $day = Input::get('day');
// 			 $time = Input::get('hour');
// 		   echo "<script type='text/javascript'>alert('day');</script>";
// 			 $data=array(
//           'day'=>$day,
//           'email'=>$time
//         );
// // 			  return DB::table('appointments')->insertGetId($data);
//   }

	public function AddEventSubmit(){ 
		
// 		 $rules = array( 'name' => 'required|unique:event_type'  );
		 $rules = array( 'name' => 'required:event_type'  );
		 $validator = Validator::make(Input::all(), $rules);
     if ($validator->fails()) { 
    		
			$return['result']=0; 
      $errors = $validator->errors()->getMessages();
      $i=0;
      foreach($errors as $k=>$val){
        $return['message'][$i]['name']=$k;
        $return['message'][$i]['message']=$val;
        $i++;
      }
// 			print_r($return); exit;
      echo json_encode($return);
    } else {
// 		$newColor = classColors::getTypesNewColors();
	 
		$newColor = Input::get('jscolor');
			 if($newColor != ''){
		$datum = array('color' => Input::get('jscolor'));
		$insertNewColor	= classColors::addNewColor($datum);
	  $data = array('name' => Input::get('name'), 'description' => Input::get('EventDescription'), 'class_id' => $insertNewColor);
			 } else {
// 		print_r($insertNewColor); exit;
			 
		$data = array('name' => Input::get('name'), 'description' => Input::get('EventDescription'), 'class_id' => Input::get('eventClassColor'));
			 }
		$insertTypes = EventTypes::insertEventTypes($data); 
// 	  $newColorId = $insertNewColor->id;
// 			 print_r($newColorId);exit;
			 
	  $return['result']=1; 
			 echo json_encode($return);
      
		}
		
	}
	
	public function AddNewEventSubmit(){
		
// 	 $rules = array( 'name' => 'required:events'  );
// 		 $validator = Validator::make(Input::all(), $rules);
//      if ($validator->fails()) { 
    		
// 			$return['result']=0; 
//       $errors = $validator->errors()->getMessages();
//       $i=0;
//       foreach($errors as $k=>$val){
//         $return['message'][$i]['name']=$k;
//         $return['message'][$i]['message']=$val;
//         $i++;
//       }
// // 			print_r($return); exit;
//       echo json_encode($return);
//     } 
// 		else {
		   $clinicId=Auth::User()->clinic_id;
		
       $EventType = Input::get('EventType');
			 $date = Input::get('date');
 			 $time = Input::get('time');
       $getEventTypeId = Events::getEventTypeId($EventType); 
		
// 		print_r(Input::get('eventDuration')); exit;

    $data = array('eventType_id' => $getEventTypeId[0]->id , 'date' => Input::get('date'), 'time' => Input::get('time'),'duration' => Input::get('eventDuration'), 'description' => Input::get('description'), 'clinic_id' => $clinicId);
		$insertNewAppointment = Events::addEvent($data); 
		
		$getTypeBgColor = classColors::getTypeBgColor($EventType);
			 
	  $return['result']=1; 
		$return['bgcolor']=$getTypeBgColor;
			 echo json_encode($return);
      
// 		}
		
	}
	
	public function EventLiveSearch(){
// 		 $event_name = Input::get('name');
// //      $get_eventnames = EventTypes::getEventNames();

		     $get_eventnames = EventTypes::getAllEventTypes();
// $result = $get_eventnames->toArray();
// 		   $result = array("a" => "1", "b" => $get_eventnames);
		   $return['result']= array("a" => "1", "b" => $get_eventnames);
       echo json_encode($return);

// 			  $return['result']=1; 
// 		console.log($get_eventnames);
// 			 echo json_encode($return);
		
		
// 		  $return['result']=1; 
// 			 echo json_encode($return);

//     $bold_search_keyword = '<strong>' . $search_keyword . '</strong>';

//     if ($query) {
//         foreach ($query as $rows) {
//             echo '<div class="show" align="left"><span class="name">' . str_ireplace
//                 ($search_keyword, $bold_search_keyword, $rows['name']) . '</span></div>';
//         }
//     } else {
//         echo '<div class="show" align="left">No matching records.</div>';
//     }
	}
	
	public function SaveEventData(){
	  	 $start = Input::get('start');
			 $end = Input::get('end');
		
			 $startdate = new DateTime(); 
		   $enddate = new DateTime();
		
			 $startdate = $startdate->createFromFormat('D M d Y H:i:s e+',$start);
			 $enddate = $enddate->createFromFormat('D M d Y H:i:s e+',$end);
		
       $date = $startdate->format('Y-m-d');	
// 		   $edate = $enddate->format('m/d/Y');	
       $startdatetime = date('H:i:s',strtotime($startdate->format('H:i:s')) - 3*60*60) ;
		   $enddatetime = date('H:i:s',strtotime($enddate->format('H:i:s')) - 3*60*60) ;
		   $duration = date_diff($startdate,$enddate);
// 		   $duration = abs(strtotime($enddatetime) - strtotime($startdatetime)) / 60;
		
// 			print_r($date); exit;
		  $data = array(
          'title'  => Input::get('title'),
				  'date' => $date,
					'start'  => $startdatetime,
					'duration'  => $duration->i
				);
			
    $saveEventData = EventTypes::saveEventData($data); 
	}
	
	public function RemoveEventType(){
			 $eventTypeName= Input::get('name');
   		 $data = array('name' => $eventTypeName);		
		   $disableEventType = EventTypes::disableEventType($data);   
	}
	
	public function addNewColor(){
// 		$newColor = Input::get('color');
// 		$data = array('color' => $newColor);
// 		$insertNewColor	= classColors::addNewColor($data);
// 	  $return['result']=1; 
// 			 echo json_encode($return);
	}
	
	public function getEventData(){
		  $eventname = Input::get('eventtitle');
			$getEventTypeId = EventTypes::getEventTypeId($eventname); 
//  		  print_r($getEventTypeId[0]->id); exit;
		  $getEventData = Events::getEventData($getEventTypeId[0]->id);
	}
	
}
