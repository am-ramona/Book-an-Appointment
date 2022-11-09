<?php

namespace App\Http\Controllers;
use App\User;
use App\EventTypes;
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

class AppointmentsController extends BaseController
{		
	
	public function AddAppointmentSubmit(){
		
		 $rules = array( 'name' => 'required:appointments'  );
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
       $patientName = Input::get('PatientName');
			 $date = Input::get('date');
 			 $time = Input::get('time');
       $getPatientId = Patients::getPatientId($patientName); 

    $data = array('name' => Input::get('name'), 'date' => Input::get('date'), 'time' => Input::get('time'),'duration' => Input::get('AppointmentDuration'),'patient_id' => $getPatientId[0]->id );
		$insertNewAppointment = Appointments::addAppointment($data); 
			 
	  $return['result']=1; 
			 echo json_encode($return);
      
		}
		
	}
	
	public function getEventId(){
		$eventname = Input::get('eventtitle');
		$getEventId = Appointments::getEventTypeId($eventname);
// 		print_r($getEventId->patient_id); exit;
 		
		
		$return['result']=1; 
		if ($getEventId != '') {
			$return['eventTypeId']=$getEventId;
// 			$return['appointmentId']=$getEventId->id;
			$getPatientName = Patients::getPatientName($getEventId->patient_id);
			$return['patientName']=$getPatientName; }
		else{ $return['eventTypeId']['eventType_id'] = '0';}

		
		echo json_encode($return);
	}
	
	public function DeleteAppointment(){
		
	}
	
}
