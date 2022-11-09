<?php

namespace App\Http\Controllers;
use App\User;
use \Auth;
use App\Patients;
use App\InsuredPatient;
use App\Insurance;
use Mail;
use Illuminate\Http\Request;
// use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;

class PatientsController extends BaseController
{	
 
	public function AddNewPatient(){
//     	 $rules = array( 'name' => 'required:event_type'  );
// 		 $validator = Validator::make(Input::all(), $rules);
    $firstname =  Input::get('PatientFirstName');
		$firstnameLength = preg_replace('/\s+/', '', strlen($firstname));
    $lastname = Input::get('PatientLastName');
		$lastnameLength = preg_replace('/\s+/', '', strlen($lastname));
    $birthdate = Input::get('birthdateTimePicker');
		$insured = Input::get('insured');
		$email = Input::get('PatientEmailAddress');
		$tel = Input::get('PatientPhoneNo');
		$string = preg_replace('/\s+/', '', strlen($tel));
		$reference = Input::get('PatientReference');

// 		print_r($insured); exit;
		$insuranceCompany = Input::get('insuranceCompanyName'); 
    
     if ($firstname ==''){   		
						$return['result']=0; 
						$return['message']='the First Name is missing';
						echo json_encode($return);
		 } else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {    				  
					 		$return['result']=0; 
							$return['message']='Only letters and white space allowed';
			        $return['nameErr'] = "firstname"; 
			      	echo json_encode($return);
   					 }
		else if ($firstnameLength < 3) {    				  
					 		$return['result']=0; 
							$return['message']='minimum First Name input required 3 letters';
			        $return['nameErr'] = "firstnameLength"; 
			      	echo json_encode($return);
   					 }
		else if ($lastname ==''){
			 			$return['result']=0; 
						$return['message']='the Last Name is missing';
						echo json_encode($return);
		 } else if ($lastnameLength < 3) {    				  
					 		$return['result']=0; 
							$return['message']='minimum Last Name input required 3 letters';
			        $return['nameErr'] = "lastnameLength"; 
			      	echo json_encode($return);
   					 }
		else if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {   				 
					 		$return['result']=0; 
							$return['message']='Only letters and white space allowed';
							$return['nameErr'] = 'lastname';
			      	echo json_encode($return);
   					 } 
		else if ((!empty ($email))&&(!filter_var($email, FILTER_VALIDATE_EMAIL))) { 
							$return['result']=0; 
							$return['message']='Invalid email format';
							$return['nameErr'] = "email"; 
			      	echo json_encode($return);
    }	else if ($tel ==''){
			 			$return['result']=0; 
						$return['message']='the Phone Number is missing';
						echo json_encode($return);		 
//       } else if (preg_match("/[a-zA-Z ]*$/",$tel)){
      } else if (!ctype_digit ($tel)){
			 			$return['result']=0;
						$return['message']='Only numbers allowed';
			      $return['nameErr']='tel';
						echo json_encode($return);		 
      }    else if ($string < 8 ){
			 			$return['result']=0; 
						$return['message']='minimum phone input required 8 digits';
						$return['nameErr'] = "phone"; 
						echo json_encode($return);		 
		}
		else if ($birthdate ==''){
			 			$return['result']=0; 
						$return['message']='the Birthdate is missing';
						echo json_encode($return);		 
      }  else if (!preg_match("/^[a-zA-Z ]*$/",$reference)) {    				  
					 		$return['result']=0; 
							$return['message']='Only letters and white space allowed';
			        $return['nameErr'] = "reference"; 
			      	echo json_encode($return);
   					 }
		else if (($insured =='1')&&($insuranceCompany =='')){ 
						$return['result']=0; 
						$return['message']='the Insurance Company Name is missing';
						echo json_encode($return);		
		}
		else {			 
						$InsuranceCompanyName = Input::get('insuranceCompanyName');
			
						if (($insured =='0')&&($insuranceCompany =='')){ 	
								$data = array('name' => $firstname.' '.$lastname, 
                              'email' => Input::get('PatientEmailAddress'), 
                              'tel' => $tel, 
                              'gender' => Input::get('gender'),
                              'occupation' => Input::get('PatientOccupation'),
                              'birthdate' => Input::get('birthdateTimePicker'),
                              'blood_type' => Input::get('PatientBloodType'),
                              'marital_status' => Input::get('PatientMaritalStatus'),
                              'address' => Input::get('PatientAddress'),
													 		'nationality' => Input::get('PatientNationality'),
													 		'educational_level' => Input::get('patientEducationalLevel'),
															'reference' => Input::get('PatientReference'),
													    'insured' => Input::get('insured'),
													    'insuranceCompany_id' => '8',
													    'status' => '1',
													    'clinic_id' =>'1'
                             );
						}
						else {
// 				$InsuranceCompanyName = Input::get('insuranceCompanyName');
				$insuranceCompany_id = Insurance::getInsuranceCompanyId($InsuranceCompanyName);
             $data = array('name' => $firstname.' '.$lastname, 
                              'email' => Input::get('PatientEmailAddress'), 
                              'tel' => $tel, 
                              'gender' => Input::get('gender'),
                              'occupation' => Input::get('PatientOccupation'),
                              'birthdate' => Input::get('birthdateTimePicker'),
                              'blood_type' => Input::get('PatientBloodType'),
                              'marital_status' => Input::get('PatientMaritalStatus'),
                              'address' => Input::get('PatientAddress'),
													 		'nationality' => Input::get('PatientNationality'),
													 		'educational_level' => Input::get('patientEducationalLevel'),
															'reference' => Input::get('PatientReference'),
													    'insured' => Input::get('insured'),
													    'insuranceCompany_id' => $insuranceCompany_id[0]->id,
													    'status' => '1',
													    'clinic_id' =>'1'
                             );
						}

                $insertNewPatient = Patients::insertNewPatient($data); 
								if($insuranceCompany <>''){
									 $datum = array('patient_id' => $insertNewPatient, 'insuranceCompanyName' => $insuranceCompany);
									 $insertInsuranceInfo = InsuredPatient::insertInsuranceInfo($datum);
								}
                  $return['result']=1; 
					        $return['NewPatientId']=$insertNewPatient;
                  echo json_encode($return);
		}
  }
	
	public function UpdatePatientData(Request $request){
		$rules = array('imageUpload'=> 'image');
		$validator = Validator::make(Input::all(), $rules);
if ($validator->fails()) {
    $return['result']=0; 
    $return['errors'] = $validator->errors()->getMessages();
} else {
    $id = Input::get('id');
		$name =  Input::get('patientProfileInput_0');
		$nameLength = preg_replace('/\s+/', '', strlen($name));
		$email = Input::get('patientProfileInput_1');
		$blood_type = Input::get('patientProfileInput_2');
		$education = Input::get('patientProfileInput_3');
		$insured =  Input::get('patientProfileInput_4');	
    $birthdate = Input::get('patientProfileInput_5');
	  $tel = Input::get('patientProfileInput_6');
		$string = preg_replace('/\s+/', '', strlen($tel));
		$nationality = Input::get('patientProfileInput_7');
	  $occupation = Input::get('patientProfileInput_8');
		$insuranceCompany = Input::get('patientProfileInput_9');
	  $gender = Input::get('patientProfileInput_10');
	  $address =  Input::get('patientProfileInput_11');
		$marital_status =  Input::get('patientProfileInput_12');
		$reference = Input::get('patientProfileInput_13');
	
	 if ($name ==''){   		
						$return['result']=0; 
		   			$return['nameErr'] = "name"; 
						$return['message']='the Name is missing';
						echo json_encode($return);
		 } else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {    				  
					 		$return['result']=0; 
							$return['message']='Only letters and white space allowed';
			        $return['nameErr'] = "nameInLetters"; 
			      	echo json_encode($return);
   					 }
		else if ($nameLength < 3) {    				  
					 		$return['result']=0; 
							$return['message']='minimum Name input required 3 letters';
			        $return['nameErr'] = "nameLength"; 
			      	echo json_encode($return);
   					 } 
	else if (!preg_match('/\s/',$name)){
							$return['result']=0; 
							$return['message']='the name should contain a firstname & a lastname';
			        $return['nameErr'] = "nameSpace"; 
			      	echo json_encode($return);
	}
	else if ((!empty ($email))&&(!filter_var($email, FILTER_VALIDATE_EMAIL))) { 
							$return['result']=0;
	 						$return['nameErr'] = "email"; 
							$return['message']='Invalid email format';
			      	echo json_encode($return);
    }else if ($tel ==''){
			 			$return['result']=0; 
						$return['nameErr'] = "emptytel";
						$return['message']='the Phone Number is missing';
						echo json_encode($return);		 
//       } else if (preg_match("/[a-zA-Z ]*$/",$tel)){
      } else if (!ctype_digit ($tel)){
			 			$return['result']=0;
						$return['message']='Only numbers allowed';
			      $return['nameErr']='tel';
						echo json_encode($return);		 
      }    else if ($string < 8 ){
			 			$return['result']=0; 
						$return['message']='minimum phone input required 8 digits';
						$return['nameErr'] = "phone"; 
						echo json_encode($return);		 
		} 
		 else if (($insured == '1')&&($insuranceCompany == 'none')){
				  $return['result']=0; 
	 				$return['nameErr'] = "insuranceCompany"; 
					$return['message']='the insurance company cannot be null';
			    echo json_encode($return);
		} else {
		if ($insured == '0'){$return['insured']=0;}
		$picture = $request->file('imageUpload');
	  $patient = Patients::find($id); 
		if ($request->hasFile('imageUpload')) {    		
			$picturename = $picture->getClientOriginalName();
			$uploadtime = time();
		  $picture->move(public_path().'/uploads/profiles_pictures', $picturename);
		} else {  $picturename =$patient->picture; }
	
		$insuranceCompanyId = Insurance::getInsuranceCompanyId($insuranceCompany);
	  $data = array('id' => $id,
									'picture' => $picturename,
										'name' => $name, 
                    'email' => $email, 
                    'tel' => $tel, 
                    'gender' => $gender,
                    'occupation' => $occupation,
                    'birthdate' => $birthdate,
                    'blood_type' => $blood_type,
                    'marital_status' => $marital_status,
                    'address' => $address,
									  'nationality' => $nationality,
								  	'educational_level' => $education,
								  	'reference' => $reference,
							  		'insured' => $insured,
									  'insuranceCompany_id' => $insuranceCompanyId[0]->id
                             );
		
		$updatePatientData = Patients::updatePatientData($data); 
		$return['result']=1;

// 		$picture = Input::get('profile_photo');
		
// 	$file = Input::file('imageUpload');
	
// 				$fileExtension = Request::file('inputFiles')->getClientOriginalExtension();
			

  /*
  talk the select file and move it public directory and make avatars
  folder if doesn't exsit then give it that unique name.
  */


// 		   $base64_str = substr($picture, strpos($picture, ",")+1);

//         //decode base64 string
//         $image = base64_decode($base64_str);
//         $png_url = "product-".time().".png";
		
//         $path = public_path() . "/img/uploads/profiles_pictures/" . $png_url;

//         Image::make($image)->save($path);
        // I've tried using 
        // $result = file_put_contents($path, $image); 
        // too but still not working


  
 
		echo json_encode($return);
			}
		}
	}
	
	public function returnNewData(){
		 $newDataValue =  Input::get('data-value');
 		  $return['result']=1; 
					        $return['newDataValue']=$newDataValue;
                  echo json_encode($return);
	}
	
	public function deletePatient(){
		$id = Input::get('id');
		$deletePatient = Patients::deletePatient($id);
		
		$return['result']=1; 
		echo json_encode($return);
		
	}

}
