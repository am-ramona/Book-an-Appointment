<?php

namespace App\Http\Controllers;
use App\User;
use \Auth;
use App\Allergen;
use App\Allergy;
use App\Alert;
use App\VisitReason;
use App\SocialHistory;
use App\DoctorNote;
use App\Attachement;
use App\Prescriptions;
use App\MassUnits;
use App\Weight;
use App\Height;
use App\Bmi;
use App\Temperature;
use App\HeartRate;
use App\FamilyHealth;
use App\MedicalHealthHistory;
use App\SurgeryHistory;
use App\Cardiovascular;
use App\Diagnosis;
use App\TestOrder;
use App\Procedure;
use App\HealthSession;
use Mail;
// use Illuminate\Http\Request;
use Request;
// use Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;

class HealthRecordController extends BaseController
{	
 
	public function AddNewAllergy(){		
    $type =  Input::get('AllergenName');
    $description = Input::get('AllergyDescription');	
		$healthsession_id=Input::get('healthsession_id');
		if($type =='- Select Allergen -'){
			 $return['result']=0; 
       echo json_encode($return);
		} else {
				$getAllergenId = Allergen::getAllergenId($type);
			  $data = array('allergen_id' => $getAllergenId[0]->id, 'description' => $description, 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id );
        $insertNewAllergy = Allergy::insertNewAllergy($data);
			  $return['result']=1; 
			  $return['allergy_id']=$insertNewAllergy; 
			  $return['AllergenName']=$type;
			  $return['AllergyDescription']=$description;
        echo json_encode($return);
		}  
//      if ($firstname ==''){   		
// 						$return['result']=0; 
// 						$return['message']='the First Name is missing';
// 						echo json_encode($return);
// 		 } 
// 		else if ($lastname ==''){
// 			 			$return['result']=0; 
// 						$return['message']='the Last Name is missing';
// 						echo json_encode($return);
// 		 } else if ($tel ==''){
// 			 			$return['result']=0; ;
// 						$return['message']='the Phone Number is missing';
// 						echo json_encode($return);		 
//       }  else if ($birthdate ==''){
// 			 			$return['result']=0; 
// 						$return['message']='the Birthdate is missing';
// 						echo json_encode($return);		 
//       }
// 		else {			 
//              $data = array('name' => $firstname.' '.$lastname, 
//                               'email' => Input::get('PatientEmailAddress'), 
//                               'tel' => Input::get('PatientPhoneNo'), 
//                               'gender' => Input::get('gender'),
//                               'occupation' => Input::get('PatientOccupation'),
//                               'birthdate' => Input::get('birthdateTimePicker'),
//                               'blood_type' => Input::get('PatientBloodType'),
//                               'marital_status' => Input::get('PatientMaritalStatus'),
//                               'address' => Input::get('PatientAddress')
//                              );

//                 $insertNewPatient = Patients::insertNewPatient($data); 
//                 $newColorId = $insertNewColor->id;
//                    print_r($insertNewPatient);exit;
	}		
	public function deleteAllergy(){
		$id = Input::get('id');
		$deleteAllergy = Allergy::deleteAllergy($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}	
	public function updateAllergy(){
		
		$id =  Input::get('AllergyId');
		$type =  Input::get('AllergenName');
    $description = Input::get('AllergyDescription');
		
		if($type =='- Select Allergen -'){
			 $return['result']=0; 
       echo json_encode($return);
		} else {
				$getAllergenId = Allergen::getAllergenId($type);
			  $data = array('id'=> $id,'allergen_id' => $getAllergenId[0]->id, 'description' => $description, 'healthsession_id' => Input::get('healthsession_id') );
        $updateAllergy = Allergy::updateAllergy($data);
			  $return['result']=1; 
			  $return['AllergenName']=$type;
        echo json_encode($return);
		}
		
	}
	
	public function AddNewAlert(){
			$rules = array(
							'text'    => 'required',
							'visibility'    => 'required',
			);   
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
				echo json_encode($return);
			} else {
				 $healthsession_id=Input::get('healthsession_id');
				 $data = array('text' => Input::get('text'), 'visibility' => Input::get('visibility'), 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id );
				 $addNewAlert = Alert::AddNewAlert($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
	}	
	public function updateAlert(){
		    $rules = array(
						'text'    => 'required',
						'visibility'    => 'required',
    	);
    
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
      echo json_encode($return);
    } else {
			 $data = array('id' => Input::get('AlertId'), 'text' => Input::get('text'), 'visibility' => Input::get('visibility'), 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
			 $addNewAlert = Alert::updateAlert($data);
			 $return['result']=1; 
       echo json_encode($return);
		}
		
	}	
	public function deleteAlert(){
			$id = Input::get('id');
		  $deleteAlert = Alert::deleteAlert($id);
			$return['result']=1; 
			echo json_encode($return);
	}
	
	public function AddNewVisitReason(){		
			$rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $healthsession_id=Input::get('healthsession_id');
				 $data = array('text' => Input::get('text'), 'fav' => Input::get('fav'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id );
				 $addNewVisitReason = VisitReason::addNewVisitReason($data);
				 $return['result']=1; 
				 $return['visitReasonId']=$addNewVisitReason; 
				 echo json_encode($return);
			}	
	}
	public function updateVisitReason(){
		  $rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('visitReasonId'), 'text' => Input::get('text'), 'fav' => Input::get('fav'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $updateVisitReason = VisitReason::updateVisitReason($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
	}	
  public function deleteVisitReason(){
		$id = Input::get('id');
		$deleteVisitReason = VisitReason::deleteVisitReason($id);		
		$return['result']=1; 
		echo json_encode($return);
	}
	
	public function AddNewSocialHistory(){
		$topic =  Input::get('topic');
    $description = Input::get('socialHistoryDescription');		
		$healthsession_id=Input::get('healthsession_id');
		if($topic ==''){
			 $return['result']=0; 
       echo json_encode($return);
		} else {
			  $data = array('topic' => $topic, 'description' => $description, 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id );
        $insertNewSocialHistory = SocialHistory::insertNewSocialHistory($data);
			  $return['result']=1; 
			  $return['SocialHistoryId']=$insertNewSocialHistory; 
        echo json_encode($return);
		}  		
	}	
	public function updateSocialHistory(){
		  $rules = array(	'topic' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('socialHistoryId'), 'topic' => Input::get('topic'), 'description' => Input::get('socialHistoryDescription'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $updateSocialHistory = SocialHistory::updateSocialHistory($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
		
	}	
	public function deleteSocialHistory(){
		$id = Input::get('id');
		$deleteSocialHistory = SocialHistory::deleteSocialHistory($id);		
		$return['result']=1; 
		echo json_encode($return); 		
	}
	
	public function AddNewNote(){
			$rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $healthsession_id=Input::get('healthsession_id');
				 $data = array('text' => Input::get('text'), 'fav' => Input::get('fav'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id  );
				 $AddNewNote = DoctorNote::AddNewNote($data);
				 $return['result']=1; 
				 $return['DoctorNoteId']=$AddNewNote; 
				 echo json_encode($return);
			}	
		
	}	
	public function updateDoctorNote(){
			$rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('DoctorNoteId'), 'text' => Input::get('text'), 'fav' => Input::get('fav'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $updateDoctorNote = DoctorNote::updateDoctorNote($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
		
	}
	public function deleteDoctorNote(){
		$id = Input::get('id');
		$deleteDoctorNote = DoctorNote::deleteDoctorNote($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddPatientFiles(){
// 		$file = Request::file('inputFiles');
// 		print_r($file); exit;
// 		if( $request->hasFile('inputFiles') ) {
//         $file = $request->file('inputFiles');
//         // Now you have your file in a variable that you can do things with
//     }
		
// 		$destinationPath = "{{url('/upload')}}";
// 		Storage::move($destinationPath);
// 		Request::file('inputFiles')->move($destinationPath);
// 		Storage::put($file, 'upload');
// 		Storage::move($file, 'upload/'.$file);
		
		$files = Input::file('inputFiles');
		$healthsession_id=Input::get('healthsession_id');
		$filenames= array();
// 		print_r($file); exit;
		foreach($files as $file){
// 				$filename = time(). '-' . $file->getClientOriginalName();
				$filename = $file->getClientOriginalName();
			  $uploadtime = time();
// 				$fileExtension = Request::file('inputFiles')->getClientOriginalExtension();
				$file->move(public_path().'/uploads/healthRecord_attach', $filename);
			  $data = array('name' => $filename, 'uploaded-time' => $uploadtime, 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => $healthsession_id);
				$AddNewAttach = Attachement::AddNewAttach($data);
				array_push($filenames, $filename);
		}
// 		Storage::disk('local')->put($file, 'upload');
// 		Request::file('inputFiles')->move($destinationPath);
// $path = Request::file('inputFiles')->getRealPath();
// $name = Request::file('inputFiles')->getClientOriginalName();
// $extension = Request::file('inputFiles')->getClientOriginalExtension();
// $size = Request::file('inputFiles')->getSize();
// $mime = Request::file('inputFiles')->getMimeType();  
	  $return['result']=1; 
		$return['filenames']=$filenames;
// 		$string=implode(",",$array);
// echo $string;
		echo json_encode($return);
	}
	public function deleteAttachment(){
			$id = Input::get('id');
		  $deleteAttachment = Attachement::deleteAttachment($id);
			$return['result']=1; 
			echo json_encode($return);	
	}
	
	public function AddNewPrescription(){
		 $rules = array('medicationName' => 'required');   
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
				echo json_encode($return);
			} else {
				 $data = array('medicationName' => Input::get('medicationName'), 
											 'strength' => Input::get('medicationStrength'), 
											 'directions' => Input::get('directionsForUse'), 
											 'quantity' => Input::get('medicationQuantity'), 
											 'refills' => Input::get('medicationRefills'), 
											 'manufactorer' => Input::get('manufactorer'), 
											 'fav' => Input::get('fav'),
											 'status' => '1',
											 'patient_id' => Input::get('patient_id'),
											 'healthsession_id' => Input::get('healthsession_id')
											);
				 $addNewPrescription = Prescriptions::AddNewPrescription($data);
				 $return['result']=1; 
				 $return['PrescriptionId']=$addNewPrescription; 
				 echo json_encode($return);
			}
	}
	public function updatePatientPrescriptionInfo(){
			$rules = array(	'medicationName' => 'required');   
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
				echo json_encode($return);
			} else {
							 $data = array('id' => Input::get('PrescriptionId'), 
														 'medicationName' => Input::get('medicationName'), 
														 'strength' => Input::get('medicationStrength'), 
														 'directions' => Input::get('directionsForUse'), 
														 'quantity' => Input::get('medicationQuantity'), 
														 'refills' => Input::get('medicationRefills'), 
														 'manufactorer' => Input::get('manufactorer'), 
														 'fav' => Input::get('fav'),
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientPrescriptionInfo = Prescriptions::updatePatientPrescriptionInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}		
	}
	public function deletePatientPrescription(){
			$id = Input::get('id');
		  $deletePatientPrescription = Prescriptions::deletePatientPrescription($id);
			$return['result']=1; 
			echo json_encode($return);	
	}
	
	public function AddWeightInfo(){
			   $weight = Input::get('patientWeight');
				 $rules = array('patientWeight' => 'required', 'weightUnit' => 'required');   
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
						echo json_encode($return);
				  } 
					else if (!is_numeric($weight)) {
											$return['result']=0; 
											$return['message']['name']="weight";
											$return['message']['message']="the weight is not numeric";
					          	echo json_encode($return);
									}	
		        else {
// 					     $weightUnit =  Input::get('weightUnit');
// 					  	 $getWeightUnitId = MassUnits::getWeightUnitId($weightUnit);
							 $data = array('patientWeight' => Input::get('patientWeight'), 
														 'weightUnit' => Input::get('weightUnit'), 
														 'curatedRange' => Input::get('curatedRange'), 
														 'abnormal' => Input::get('abnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewWeight = Weight::AddNewWeight($data);
							 $return['result']=1; 
							 $return['WeightId']=$addNewWeight;
							 echo json_encode($return);
			}	
	}	
	public function deletePatientWeight(){
		$id = Input::get('id');
		$deletePatientWeight = Weight::deletePatientWeight($id);		
		$return['result']=1; 
		echo json_encode($return);		
	}	
	public function updatePatientWeightInfo(){
		$weight = Input::get('patientWeight');
				  $rules = array(	'patientWeight' => 'required', 'weightUnit' => 'required'	);   
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
				echo json_encode($return);
			} 	else if (!is_numeric($weight)) {
											$return['result']=0; 
											$return['message']['name']="weight";
											$return['message']['message']="the weight is not numeric";
					          	echo json_encode($return);
									}	
		else {
							 $data = array('id' => Input::get('WeightId'), 
														 'patientWeight' => Input::get('patientWeight'), 
														 'weightUnit' => Input::get('weightUnit'), 
														 'curatedRange' => Input::get('curatedRange'), 
														 'abnormal' => Input::get('abnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientWeightInfo = Weight::updatePatientWeightInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}		
	}
	
	public function AddHeightInfo(){
				 $height = Input::get('patientHeight');
				 $rules = array('patientHeight' => 'required', 'heightUnit' => 'required');   
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
						echo json_encode($return);
				  } 
					else if (!is_numeric($height)) {
											$return['result']=0; 
											$return['message']['name']="height";
											$return['message']['message']="the height is not numeric";
					          	echo json_encode($return);
									}	
		        else {
// 					     $weightUnit =  Input::get('weightUnit');
// 					  	 $getWeightUnitId = MassUnits::getWeightUnitId($weightUnit);
							 $data = array('patientHeight' => Input::get('patientHeight'), 
														 'heightUnit' => Input::get('heightUnit'), 
														 'curatedRange' => Input::get('heightCuratedRange'), 
														 'abnormal' => Input::get('heightAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewHeight = Height::AddNewHeight($data);
							 $return['result']=1; 
							 $return['HeightId']=$addNewHeight; 							
							 echo json_encode($return);
			}			
	}	
	public function updatePatientHeightInfo(){
				$height = Input::get('patientHeight');
				  $rules = array(	'patientHeight' => 'required', 'heightUnit' => 'required'	);   
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
				echo json_encode($return);
			} 	else if (!is_numeric($height)) {
											$return['result']=0; 
											$return['message']['name']="height";
											$return['message']['message']="the height is not numeric";
					          	echo json_encode($return);
									}	
		else {
							 $data = array('id' => Input::get('HeightId'), 
														 'patientHeight' => Input::get('patientHeight'), 
														 'heightUnit' => Input::get('heightUnit'), 
														 'curatedRange' => Input::get('heightCuratedRange'), 
														 'abnormal' => Input::get('heightAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientHeightInfo = Height::updatePatientHeightInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}		
	}
	public function deletePatientHeight(){
		$id = Input::get('id');
		$deletePatientHeight = Height::deletePatientHeight($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddBmiInfo(){
		     $patientBmi = Input::get('patientBmi');
				 $rules = array('patientBmi' => 'required', 'bmiUnit' => 'required');   
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
						echo json_encode($return);
				  } 
					else if (!is_numeric($patientBmi)) {
											$return['result']=0; 
											$return['message']['name']="bmi";
											$return['message']['message']="the bmi is not numeric";
					          	echo json_encode($return);
									}	
		        else {
							 $data = array('patientBmi' => Input::get('patientBmi'), 
														 'bmiUnit' => Input::get('bmiUnit'), 
														 'curatedRange' => Input::get('bmiCuratedRange'), 
														 'abnormal' => Input::get('bmiAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewBmi = Bmi::AddNewBmi($data);
							 $return['result']=1; 
							 $return['BmiId']=$addNewBmi; 			
							 echo json_encode($return);
			}					
	}	
	public function updateBmi(){
			$patientBmi = Input::get('patientBmi');
			$rules = array(	'patientBmi' => 'required', 'bmiUnit' => 'required'	);   
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
				echo json_encode($return);
			} 	else if (!is_numeric($patientBmi)) {
											$return['result']=0; 
											$return['message']['name']="bmi";
											$return['message']['message']="the bmi is not numeric";
					          	echo json_encode($return);
									}	
		else {
							 $data = array('id' => Input::get('BmiId'), 
														 'patientBmi' => Input::get('patientBmi'), 
														 'bmiUnit' => Input::get('bmiUnit'), 
														 'curatedRange' => Input::get('bmiCuratedRange'), 
														 'abnormal' => Input::get('bmiAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientBmiInfo = Bmi::updatePatientBmiInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}			
	}
	public function deleteBmi(){
		$id = Input::get('id');
		$deletePatientWeight = Bmi::deletePatientBmi($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddTemperatureInfo(){
				 $patientTemperature = Input::get('patientTemperature');
				 $rules = array('patientTemperature' => 'required', 'temperatureUnit' => 'required');   
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
						echo json_encode($return);
				  } 
					else if (!is_numeric($patientTemperature)) {
											$return['result']=0; 
											$return['message']['name']="temperature";
											$return['message']['message']="the temperature is not numeric";
					          	echo json_encode($return);
									}	
		        else {
							 $data = array('patientTemperature' => Input::get('patientTemperature'), 
														 'temperatureUnit' => Input::get('temperatureUnit'), 
														 'curatedRange' => Input::get('temperatureCuratedRange'), 
														 'abnormal' => Input::get('temperatureAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewTemperature = Temperature::AddNewTemperature($data);
							 $return['result']=1; 
							 $return['TemperatureId']=$addNewTemperature; 
							 echo json_encode($return);
			}			
	}	
	public function updateTemperature(){
			$patientTemperature = Input::get('patientTemperature');
			$rules = array(	'patientTemperature' => 'required', 'temperatureUnit' => 'required'	);   
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
				echo json_encode($return);
			} 	else if (!is_numeric($patientTemperature)) {
											$return['result']=0; 
											$return['message']['name']="temperature";
											$return['message']['message']="the temperature is not numeric";
					          	echo json_encode($return);
									}	
		else {
							 $data = array('id' => Input::get('TemperatureId'), 
														 'patientTemperature' => Input::get('patientTemperature'), 
														 'temperatureUnit' => Input::get('temperatureUnit'), 
														 'curatedRange' => Input::get('temperatureCuratedRange'), 
														 'abnormal' => Input::get('temperatureAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientTemperatureInfo = Temperature::updatePatientTemperatureInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}				
	}	
	public function deleteTemperature(){
		$id = Input::get('id');
		$deletePatientTemperature = Temperature::deletePatientTemperature($id);		
		$return['result']=1; 
		echo json_encode($return);			
	}
	
	public function AddHeartRateInfo(){
				 $patientHeartRate = Input::get('patientHeartRate');
				 $rules = array('patientHeartRate' => 'required', 'heartRateUnit' => 'required');   
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
						echo json_encode($return);
				  } 
					else if (!is_numeric($patientHeartRate)) {
											$return['result']=0; 
											$return['message']['name']="heart rate";
											$return['message']['message']="the heart rate is not numeric";
					          	echo json_encode($return);
									}	
		        else {
							 $data = array('patientHeartRate' => Input::get('patientHeartRate'), 
														 'heartRateUnit' => Input::get('heartRateUnit'), 
														 'curatedRange' => Input::get('heartRateCuratedRange'), 
														 'abnormal' => Input::get('heartRateAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewHeartRate = HeartRate::AddNewHeartRate($data);
							 $return['result']=1; 
							 $return['HeartRateId']=$addNewHeartRate; 
							 echo json_encode($return);
			}			
	}	
	public function updateHeartRate(){
		  $patientHeartRate = Input::get('patientHeartRate');
			$rules = array(	'patientHeartRate' => 'required', 'heartRateUnit' => 'required'	);   
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
				echo json_encode($return);
			} 	else if (!is_numeric($patientHeartRate)) {
											$return['result']=0; 
											$return['message']['name']="heart rate";
											$return['message']['message']="the heart rate is not numeric";
					          	echo json_encode($return);
									}	
		else {
							 $data = array('id' => Input::get('HeartRateId'), 
														 'patientHeartRate' => Input::get('patientHeartRate'), 
														 'heartRateUnit' => Input::get('heartRateUnit'), 
														 'curatedRange' => Input::get('heartRateCuratedRange'), 
														 'abnormal' => Input::get('heartRateAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updatePatientHeartRateInfo = HeartRate::updatePatientHeartRateInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}					
	}
	public function deleteHeartRate(){
		$id = Input::get('id');
		$deletePatientHeartRate = HeartRate::deletePatientHeartRate($id);		
		$return['result']=1; 
		echo json_encode($return);		
	}
	
	public function AddFamilyHealthInfo(){
				 $rules = array('relationship' => 'required', 'desease' => 'required');   
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
						echo json_encode($return);
				  } 
		        else {
							 $data = array('relationship' => Input::get('relationship'), 
														 'desease' => Input::get('desease'), 
														 'deseaseDiagnosis' => Input::get('deseaseDiagnosis'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewFamilyHealth = FamilyHealth::AddNewFamilyHealth($data);
							 $return['result']=1; 
							 $return['FamilyHealthHistoryId']=$addNewFamilyHealth; 
							 echo json_encode($return);
			}			
	}
	public function deleteFamilyHealthItem(){
	  $id = Input::get('id');
		$deleteFamilyHealthItem = FamilyHealth::deleteFamilyHealthItem($id);		
		$return['result']=1; 
		echo json_encode($return);		
	}
	public function updateFamilyHealthItem(){
			$rules = array(	'relationship' => 'required', 'desease' => 'required'	);   
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
				echo json_encode($return);
			} 
		else { 
							 $data = array('id' => Input::get('FamilyHealthHistoryId'),  
														 'relationship' => Input::get('relationship'), 
														 'desease' => Input::get('desease'), 
														 'deseaseDiagnosis' => Input::get('deseaseDiagnosis'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updateFamilyHealthItem = FamilyHealth::updateFamilyHealthItem($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}						
	}
	
	public function AddMedicalHealthHistoryItem(){
				 $rules = array('historyDesease' => 'required');   
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
						echo json_encode($return);
				  } 
		        else {
							 $data = array('historyDesease' => Input::get('historyDesease'), 
														 'historyDeseaseDiagnosis' => Input::get('historyDeseaseDiagnosis'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewMedicalHealthHistoryItem = MedicalHealthHistory::AddNewMedicalHealthHistoryItem($data);
							 $return['result']=1; 
							 $return['MedicalHealthHistoryId']=$addNewMedicalHealthHistoryItem; 
							 echo json_encode($return);
			}		
	}
	public function updateMedicalHealthHistory(){
			$rules = array(	'historyDesease' => 'required'	);   
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
				echo json_encode($return);
			} 
		else {
							 $data = array('id' => Input::get('MedicalHealthHistoryId'), 
														 'historyDesease' => Input::get('historyDesease'), 
														 'historyDeseaseDiagnosis' => Input::get('historyDeseaseDiagnosis'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updateMedicalHealthHistoryItem = MedicalHealthHistory::updateMedicalHealthHistoryItem($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}						
	}
	public function deleteMedicalHealthHistoryItem(){
		$id = Input::get('id');
		$deleteMedicalHealthHistoryItem = MedicalHealthHistory::deleteMedicalHealthHistoryItem($id);		
		$return['result']=1; 
		echo json_encode($return);		
	}
	
	public function AddSurgeryHistoryItem(){
			 $rules = array('operationCause' => 'required');   
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
						echo json_encode($return);
				  } 
		        else {
							 $data = array('operationCause' => Input::get('operationCause'), 
														 'operationNotes' => Input::get('operationNotes'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addNewSurgeryHistoryItem = SurgeryHistory::AddNewSurgeryHistoryItem($data);
							 $return['result']=1; 
							 $return['SurgeryHistoryId']=$addNewSurgeryHistoryItem; 
							 echo json_encode($return);
			}		
	}
	public function updateSurgeryHistory(){
			$rules = array(	'operationCause' => 'required'	);   
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
				echo json_encode($return);
			} 
		else {
							 $data = array('id' => Input::get('SurgeryHistoryId'), 
														 'operationCause' => Input::get('operationCause'), 
														 'operationNotes' => Input::get('operationNotes'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updateSurgeryHistoryItem = SurgeryHistory::updateSurgeryHistoryItem($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}						
		
	}	
	public function deleteSurgeryHistory(){
		$id = Input::get('id');
		$deleteSurgeryHistoryItem = SurgeryHistory::deleteSurgeryHistoryItem($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddCardiovascularRiskFactorsInfo(){
			$data = array(
					'patientSys' => Input::get('patientSys'), 
					'sysUnit' => Input::get('sysUnit'), 
					'patientDia' => Input::get('patientDia'), 
					'diaUnit' => Input::get('diaUnit'), 
					'patientDiabetesRate' => Input::get('patientDiabetesRate'), 
					'diabetesUnit' => Input::get('diabetesUnit'), 
					'patientCholesterolRate' => Input::get('patientCholesterolRate'), 
					'cholesterolUnit' => Input::get('cholesterolUnit'), 
					'patientHDLcRate' => Input::get('patientHDLcRate'), 
					'HDLcUnit' => Input::get('HDLcUnit'), 
					'patientLDLcRate' => Input::get('patientLDLcRate'), 
					'LDLcUnit' => Input::get('LDLcUnit'), 
					'patientCholesterolToHDLcRate' => Input::get('patientCholesterolToHDLcRate'), 
					'patientTriglycerideRate' => Input::get('triglycerideUnit'), 
					'triglycerideUnit' => Input::get('triglycerideUnit'), 
					'obesity' => Input::get('cardiovascularAbnormal')
			);
		if(!array_filter($data)) {
				$return['result']=0;
				$return['message']='Please enter a value into at least one of the fields in the form';
				echo json_encode($return);		
		}  else {
// 			$arrayname[indexname] = $value;
			$data['status'] = '1';
			$data['patient_id'] = Input::get('patient_id');
			$data['healthsession_id'] = Input::get('healthsession_id');
			$data['healths'] = '0';
// 							 $data = array('patientSys' => Input::get('patientSys'), 
// 														 'sysUnit' => Input::get('sysUnit'), 
// 														 'patientDia' => Input::get('patientDia'), 
// 														 'diaUnit' => Input::get('diaUnit'), 
// 														 'patientDiabetesRate' => Input::get('patientDiabetesRate'), 
// 														 'diabetesUnit' => Input::get('diabetesUnit'), 
// 														 'patientCholesterolRate' => Input::get('patientCholesterolRate'), 
// 														 'cholesterolUnit' => Input::get('cholesterolUnit'), 
// 														 'patientHDLcRate' => Input::get('patientHDLcRate'), 
// 														 'HDLcUnit' => Input::get('HDLcUnit'), 
// 														 'patientLDLcRate' => Input::get('patientLDLcRate'), 
// 														 'LDLcUnit' => Input::get('LDLcUnit'), 
// 														 'patientCholesterolToHDLcRate' => Input::get('patientCholesterolToHDLcRate'), 
// 														 'patientTriglycerideRate' => Input::get('patientTriglycerideRate'), 
// 														 'triglycerideUnit' => Input::get('triglycerideUnit'), 
// 														 'obesity' => Input::get('cardiovascularAbnormal'),
														 
// 														 'status' => '1',
// 														 'patient_id' => Input::get('patient_id'),
// 														 'healthsession_id' => Input::get('healthsession_id'),
// 														 'healths'=> '0'
// 														);
							 $AddCardiovascularRiskFactorsInfo = Cardiovascular::AddCardiovascularRiskFactorsInfo($data);
							 $return['result']=1; 
							 $return['CardiovascularId']=$AddCardiovascularRiskFactorsInfo; 
							 echo json_encode($return);
			}	
	}
	public function updatePatientCardiovascularInfo(){
			$array = array(
    'patientSys' => Input::get('patientSys'), 
		'sysUnit' => Input::get('sysUnit'), 
		'patientDia' => Input::get('patientDia'), 
		'diaUnit' => Input::get('diaUnit'), 
		'patientDiabetesRate' => Input::get('patientDiabetesRate'), 
		'diabetesUnit' => Input::get('diabetesUnit'), 
		'patientCholesterolRate' => Input::get('patientCholesterolRate'), 
		'cholesterolUnit' => Input::get('cholesterolUnit'), 
		'patientHDLcRate' => Input::get('patientHDLcRate'), 
		'HDLcUnit' => Input::get('HDLcUnit'), 
		'patientLDLcRate' => Input::get('patientLDLcRate'), 
		'LDLcUnit' => Input::get('LDLcUnit'), 
		'patientCholesterolToHDLcRate' => Input::get('patientCholesterolToHDLcRate'), 
		'patientTriglycerideRate' => Input::get('triglycerideUnit'), 
		'triglycerideUnit' => Input::get('triglycerideUnit'), 
		'obesity' => Input::get('cardiovascularAbnormal'),
);
		if(!array_filter($array)) {
				$return['result']=0;
				$return['message']='Please enter a value into at least one of the fields in the form';
				echo json_encode($return);		
		}  else {
							 $data = array('id' => Input::get('CardiovascularId'), 
														 'patientSys' => Input::get('patientSys'), 
														 'sysUnit' => Input::get('sysUnit'), 
														 'patientDia' => Input::get('patientDia'), 
														 'diaUnit' => Input::get('diaUnit'), 
														 'patientDiabetesRate' => Input::get('patientDiabetesRate'), 
														 'diabetesUnit' => Input::get('diabetesUnit'), 
														 'patientCholesterolRate' => Input::get('patientCholesterolRate'), 
														 'cholesterolUnit' => Input::get('cholesterolUnit'), 
														 'patientHDLcRate' => Input::get('patientHDLcRate'), 
														 'HDLcUnit' => Input::get('HDLcUnit'), 
														 'patientLDLcRate' => Input::get('patientLDLcRate'), 
														 'LDLcUnit' => Input::get('LDLcUnit'), 
														 'patientCholesterolToHDLcRate' => Input::get('patientCholesterolToHDLcRate'), 
														 'patientTriglycerideRate' => Input::get('patientTriglycerideRate'), 
														 'triglycerideUnit' => Input::get('triglycerideUnit'), 
														 'obesity' => Input::get('cardiovascularAbnormal'),
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);				
				 $updateCardiovascularRiskFactorsInfo = Cardiovascular::updateCardiovascularRiskFactorsInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}						
	}
	public function deletePatientCardiovascular(){
		$id = Input::get('id');
		$deletePatientCardiovascular = Cardiovascular::deletePatientCardiovascular($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddDiagnosis(){
			$rules = array('text' => 'required');   
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
				echo json_encode($return);
			} else {
				 $data = array('text' => Input::get('text'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $addNewDiagnosis = Diagnosis::addNewDiagnosis($data);
				 $return['result']=1; 
				 $return['DiagnosisId']=$addNewDiagnosis; 
				 echo json_encode($return);
			}			
	}
	public function updatePatientDiagnosisInfo(){
		 $rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('DiagnosisId'), 'text' => Input::get('text'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $updatePatientDiagnosisInfo = Diagnosis::updatePatientDiagnosisInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
	}
	public function deletePatientDiagnosis(){
		$id = Input::get('id');
		$deletePatientDiagnosis = Diagnosis::deletePatientDiagnosis($id);		
		$return['result']=1; 
		echo json_encode($return);	
	}
	
	public function AddTestOrderInfo(){
				 $rules = array('test' => 'required');   
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
						echo json_encode($return);
				  } else {
							 $data = array('test' => Input::get('test'), 
														 'testResult' => Input::get('testResult'), 
														 'curatedRange' => Input::get('testOrderCuratedRange'), 
														 'abnormal' => Input::get('testOrderAbnormal'), 
														 'status' => '1',
														 'patient_id' => Input::get('patient_id'),
														 'healthsession_id' => Input::get('healthsession_id')
														);
							 $addTestOrderInfo = TestOrder::AddTestOrderInfo($data);
							 $return['result']=1; 
							 $return['TestOrderId']=$addTestOrderInfo; 
							 echo json_encode($return);
			}	
		
	}
	public function updatePatientTestOrderInfo(){
			$rules = array(	'test' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('TestOrderId'),
											'test' => Input::get('test'), 
											'testResult' => Input::get('testResult'), 
										  'curatedRange' => Input::get('testOrderCuratedRange'), 
											'abnormal' => Input::get('testOrderAbnormal'), 
											'status' => '1',
											'patient_id' => Input::get('patient_id'),
											'healthsession_id' => Input::get('healthsession_id')
											);
				 $updatePatientTestOrderInfo = TestOrder::updatePatientTestOrderInfo($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
	}
	public function deletePatientTestOrder(){
		$id = Input::get('id');
		$deletePatientTestOrder = TestOrder::deletePatientTestOrder($id);		
		$return['result']=1; 
		echo json_encode($return);
	}
	
	public function AddProcedure(){
			$rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('text' => Input::get('text'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $addNewProcedure = Procedure::addNewProcedure($data);
				 $return['result']=1; 
				 $return['ProcedureId']=$addNewProcedure; 
				 echo json_encode($return);
			}	
	}
	public function updatePatientProcedure(){
			$rules = array(	'text' => 'required'	);   
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
				echo json_encode($return);
			} else {
				 $data = array('id' => Input::get('ProcedureId'), 'text' => Input::get('text'), 'status' => '1', 'patient_id' => Input::get('patient_id'), 'healthsession_id' => Input::get('healthsession_id') );
				 $updateProcedure = Procedure::updateProcedure($data);
				 $return['result']=1; 
				 echo json_encode($return);
			}
	}
	public function deleteProcedure(){
		$id = Input::get('id');
		$deleteProcedure = Procedure::deleteProcedure($id);		
		$return['result']=1; 
		echo json_encode($return);
	}
	
	public function addNewHealthSession(){
		$data = array('date' => Input::get('date'), 'time' => Input::get('time'), 'status' => '1', 'patient_id' => Input::get('patient_id') );
		$addNewHealthSession = HealthSession::addNewHealthSession($data);
		$return['result']=1; 
		$return['sessionId']=$addNewHealthSession;
		echo json_encode($return);	
	}
	
// 	public function UpdatePatientData(){
		
// 		$id = Input::get('id');
// 		$name =  Input::get('patientProfileInput_0');
//     $gender = Input::get('patientProfileInput_1');
//     $birthdate = Input::get('patientProfileInput_2');
// 		$blood_type = Input::get('patientProfileInput_3');
// 		$marital_status =  Input::get('patientProfileInput_4');
//     $occupation = Input::get('patientProfileInput_5');
//     $tel = Input::get('patientProfileInput_6');
// 		$email = Input::get('patientProfileInput_7');
// 		$address =  Input::get('patientProfileInput_8');
		
// 		  $data = array('id' => $id,
// 										'name' => $name, 
//                     'email' => $email, 
//                     'tel' => $tel, 
//                     'gender' => $gender,
//                     'occupation' => $occupation,
//                     'birthdate' => $birthdate,
//                     'blood_type' => $blood_type,
//                     'marital_status' => $marital_status,
//                     'address' => $address
//                              );
		
// 		$updatePatientData = Patients::updatePatientData($data); 
		
// 		$return['result']=1;     
// 		echo json_encode($return);
	
// 	}
	
// 	public function deletePatient(){
// 		$id = Input::get('id');
// 		$deletePatient = Patients::deletePatient($id);
		
// 		$return['result']=1; 
// 		echo json_encode($return);
		
// 	}

}
