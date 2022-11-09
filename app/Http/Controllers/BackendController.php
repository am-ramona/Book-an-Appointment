<?php

namespace App\Http\Controllers;
use App\User;
use App\Patients;
use App\Insurance;
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
use \Auth;
use Mail;
// use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;

class BackendController extends BaseController
{
   public function login(){
     if(Auth::check()){
       return Redirect::to('dashboard');
     }else{
       return view('backend.login');
     }
    
   }
  
   public function dashboard(){
    if(Auth::check()){
      $active_nav = 'dashboard';
      return view('backend.dashboard')->with(compact('active_nav'));
    }else{
      return Redirect::to('login');
    }
  }
	
	public function patients(){
		  if(Auth::check()){
			$patients = Patients::getAllPatients();
			$insuranceCompanies = Insurance::getAllInsuranceCompanies();
      $active_nav = 'patients';
      return view('backend.patients')->with(compact('active_nav', 'patients', 'insuranceCompanies'));
		}else{
      return Redirect::to('login');
    }
  }
	
// 		public function profile(){
// 		  if(Auth::check()){
//       $active_nav = 'profile';
//       return view('backend.profile')->with(compact('active_nav'));
// 		}else{
//       return Redirect::to('login');
//     }
//   }
	
	public function view_profile($id){
		  if(Auth::check()){
			  
				$patient = Patients::find($id); 
				$allergens = Allergen::getAllAllergen();
				$patientallergies = Allergy::getAllPatientAllergies($patient->id);
				$patientAlerts = Alert::getAllPatientAlerts($patient->id);
				$patientVisitReasons = VisitReason::getAllPatientVisitReason($patient->id);
				$patientSocialHistories = SocialHistory::getAllPatientSocialHistories($patient->id);
				$patientDoctorNotes = DoctorNote::getAllPatientDoctorNotes($patient->id);			
				$patientAttachments = Attachement::getAllPatientAttachments($patient->id);
				$patientPrescriptions = Prescriptions::getAllPatientPrescriptions($patient->id);
				$weightUnits = MassUnits::getAllWeightUnits();
				$patientWeights = Weight::getPatientWeight($patient->id);
				$patientHeights = Height::getPatientHeight($patient->id);
				$patientBmis = Bmi::getPatientBmi($patient->id);
				$patientTemperatures = Temperature::getPatientTemperatures($patient->id);				
				$patientHeartRates = HeartRate::getPatientHeartRates($patient->id);	
				$patientFamilyDiseases = FamilyHealth::getPatientFamilyDiseases($patient->id);
				$patientMedicalHealthHistories = MedicalHealthHistory::getPatientMedicalHealthHistories($patient->id);
				$patientSurgeryHistories = SurgeryHistory::getPatientSurgeryHistories($patient->id);
				$patientCardiovascularRiskFactors = Cardiovascular::getPatientCardiovascularRiskfactors($patient->id);
				$patientDiagnoses = Diagnosis::getAllPatientDiagnoses($patient->id);
				$patientTestOrders = TestOrder::getAllPatientTestOrders($patient->id);
				$patientProcedures = Procedure::getAllPatientProcedures($patient->id);
				$patientSessions = HealthSession::getAllPatientSessions($patient->id);
				$patientInsuranceCompany = Insurance::getPatientInsuranceCompany($patient->insuranceCompany_id);
				$insuranceCompanies = Insurance::getAllInsuranceCompanies();
// 				$patientWeightUnit = MassUnits::getPatientWeightUnit($patientWeights[0]->id);
// 				$patientData = Patients::getPatientData(); 
				$active_nav = 'profile';
//  			 if (is_object($events)) {echo'<script>alert("types object")</script>';} else if (is_array($types)){echo'<script>alert("types array")</script>';}
				return view('backend.profile')->with(compact('active_nav', 
																										 'patient', 
																										 'allergens',
																										 'patientallergies', 
																										 'patientAlerts', 
																										 'patientVisitReasons',
																										 'patientSocialHistories', 
																										 'patientDoctorNotes', 
																										 'patientAttachments', 
																										 'patientPrescriptions',
																										 'weightUnits',
																										 'patientWeights',
																										 'patientHeights',
																										 'patientBmis',
																										 'patientTemperatures',
																										 'patientHeartRates',
																										 'patientFamilyDiseases',
																										 'patientMedicalHealthHistories',
																										 'patientSurgeryHistories',
																										 'patientCardiovascularRiskFactors',
																										 'patientDiagnoses',
																										 'patientTestOrders',
																										 'patientProcedures',
																										 'patientSessions',
																										 'patientInsuranceCompany',
																										 'insuranceCompanies'));				
			} else return Redirect::to('login');	 		 
  }
	
  public function billing(){
		 if(Auth::check()){
      $active_nav = 'billing';
      return view('backend.billing')->with(compact('active_nav'));
			 	}else{
      return Redirect::to('login');
    }
  }
	
	public function settings(){
			 if(Auth::check()){
      $active_nav = 'settings';
      return view('backend.settings')->with(compact('active_nav'));
				 	}else{
      return Redirect::to('login');
    }
  }
  
  public function reset(){
		 if(Auth::check()){
    return view('backend.reset');
			  	}else{
      return Redirect::to('login');
    }
  }
  
  public function login_submit(Request $request){
    $rules = array(
      'email'    => 'required',
      'password'    => 'required',
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
// 			print_r($return); exit;
      echo json_encode($return);
    } else {
      $credentials = array(
        'email'     => strtolower(Input::get('email')),
        'password'  => Input::get('password')
      );
      //User::registerUser($credentials);
      
      // if login successful with these credentials
      if (Auth::attempt($credentials, $rememberToken = false)) {
        // set the remember me cookie if the user checks the box     
        $remember = Input::get('remember');
        if(!empty($remember)){
          $rememberToken = true;
        } 
				
// 				alert( $rememberToken);
        
        $admin = User::getAccountVar('id',$credentials['email'],'email');
        $iduser = $admin->id;

        $ip = User::getIP();
        User::updateLastLogin($ip,$iduser);

        $url = Session::get('url.intended');
        if(isset($url) && !empty($url))
          $intended_url = Session::get('url.intended');
        else
          $intended_url = '/dashboard';
        
        Session::forget('url.intended');
               
        $return['response']['type'] ='success'; 
        $return['response']['message']='Success!'; 
        $return['response']['intended_url']=$intended_url;
        
        echo json_encode($return);
      } else {
        $return['response']['type'] ='error'; 
        $return['response']['message']='Your username or password is incorrect'; 
        echo json_encode($return);
      }
    }
  }
  
  public function resetlink(){
		$rules = array(
      'email'=> 'required|email',
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
    }else{
      if(User::checkemailexist(Input::get('email'))>0){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $token = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 32; $i++) {
            $n = rand(0, $alphaLength);
            $token[] = $alphabet[$n];
        }
        $token_key=implode($token);
        $email=Input::get('email');
        $data=array(
          'token_key'=>$token_key,
          'email'=>$email
        );
        $resetinfoison = json_encode($data);
        $datauser = array(
          'token_key'  => $token_key,
          'token_date'  => time(),
        );
        User::addtoken($email,$datauser);
        $encrypted = Crypt::encryptString($resetinfoison);
        $return['response']['type']='success'; 
        $return['response']['message'] ="An email has been sent to reset your password";
    
				$infouser=User::getinfobyemail($email);
				$nameuser=$infouser->first_name.' '.$infouser->last_name;
				$dataemail = ['email' => 'no-reply@doctors','name'=>'Doctors Portal','nameuser'=>$nameuser,'token'=>$encrypted,'action'=>"reset_password",'title'=>'Reset Password'];
        $mail=Mail::send('emails.template', $dataemail, function($message) use ($email,$dataemail,$nameuser)
        {
            $swiftMessage = $message->getSwiftMessage();
            $headers = $swiftMessage->getHeaders();
            $headers->addTextHeader('x-mailgun-native-send', 'true');
            $message->to($email, $nameuser)->subject('Reset Password');
        });
				
         echo json_encode($return);

      }else{
         $return['result']=0; 
         $return['message'][0]['name']='email';
         $return['message'][0]['message']='Your email was not recognized'; 
         echo json_encode($return);
      }
    }
	}
}
