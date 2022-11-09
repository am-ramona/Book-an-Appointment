<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@test' );
Route::get('/login', 'BackendController@login' );
Route::get('/dashboard', 'BackendController@dashboard' );
Route::get('/appointments', 'EventsController@appointments' );
// Route::post('/appointmentSchedule', 'EventsController@appointmentSchedule' );
Route::get('/patients', 'BackendController@patients' );
Route::get('/billing', 'BackendController@billing' );
Route::get('/settings', 'BackendController@settings' );
Route::get('/reset/{token}', 'BackendController@reset' );
Route::get('/profile/{id}', 'BackendController@view_profile' );

Route::post('/test', 'TestController@test' );
Route::post('/login', 'BackendController@login_submit' );
Route::post('/reset', 'BackendController@resetlink');
Route::post('/events', 'EventsController@AddEventSubmit' );
Route::post('/searching', 'EventsController@EventLiveSearch');
Route::post('/SaveEventData', 'EventsController@SaveEventData');
Route::post('/addAppointment', 'AppointmentsController@AddAppointmentSubmit');
Route::post('/addEvent', 'EventsController@AddNewEventSubmit' );
Route::post('/RemoveEventType', 'EventsController@RemoveEventType');
Route::post('/addNewColor', 'EventsController@addNewColor');
Route::post('/getEventId', 'AppointmentsController@getEventId');
Route::post('/getEventData', 'EventsController@getEventData');
Route::post('/DeleteAppointment', 'AppointmentsController@DeleteAppointment');
Route::post('/addNewPatient', 'PatientsController@AddNewPatient');
// Route::post('/profile/{id}', 'PatientsController@UpdatePatientData');
Route::post('/updatePatientInfo', 'PatientsController@UpdatePatientData');
Route::post('/returnNewData', 'PatientsController@returnNewData');
Route::post('/deletePatient', 'PatientsController@deletePatient');
Route::post('/AddNewAllergy', 'HealthRecordController@AddNewAllergy');
Route::post('/deleteAllergy', 'HealthRecordController@deleteAllergy');
Route::post('/deleteAlert', 'HealthRecordController@deleteAlert');
Route::post('/updateAllergy', 'HealthRecordController@updateAllergy');
Route::post('/AddNewAlert', 'HealthRecordController@AddNewAlert');
Route::post('/updateAlert', 'HealthRecordController@updateAlert');
Route::post('/AddNewVisitReason', 'HealthRecordController@AddNewVisitReason');
Route::post('/updateVisitReason', 'HealthRecordController@updateVisitReason');
Route::post('/deleteVisitReason', 'HealthRecordController@deleteVisitReason');
Route::post('/AddNewSocialHistory', 'HealthRecordController@AddNewSocialHistory');
Route::post('/updateSocialHistory', 'HealthRecordController@updateSocialHistory');
Route::post('/deleteSocialHistory', 'HealthRecordController@deleteSocialHistory');
Route::post('/AddNewNote', 'HealthRecordController@AddNewNote');
Route::post('/updateDoctorNote', 'HealthRecordController@updateDoctorNote');
Route::post('/deleteDoctorNote', 'HealthRecordController@deleteDoctorNote');
Route::post('/AddPatientFiles', 'HealthRecordController@AddPatientFiles');
Route::post('/deleteAttachment', 'HealthRecordController@deleteAttachment');
Route::post('/AddNewPrescription', 'HealthRecordController@AddNewPrescription');
Route::post('/AddWeightInfo', 'HealthRecordController@AddWeightInfo');
Route::post('/deletePatientWeight', 'HealthRecordController@deletePatientWeight');
Route::post('/updatePatientWeightInfo', 'HealthRecordController@updatePatientWeightInfo');
Route::post('/AddHeightInfo', 'HealthRecordController@AddHeightInfo');
Route::post('/updatePatientHeightInfo', 'HealthRecordController@updatePatientHeightInfo');
Route::post('/deletePatientHeight', 'HealthRecordController@deletePatientHeight');
Route::post('/AddBmiInfo', 'HealthRecordController@AddBmiInfo');
Route::post('/updateBmi', 'HealthRecordController@updateBmi');
Route::post('/deleteBmi', 'HealthRecordController@deleteBmi');
Route::post('/AddTemperatureInfo', 'HealthRecordController@AddTemperatureInfo');
Route::post('/updateTemperature', 'HealthRecordController@updateTemperature');
Route::post('/deleteTemperature', 'HealthRecordController@deleteTemperature');
Route::post('/AddHeartRateInfo', 'HealthRecordController@AddHeartRateInfo');
Route::post('/updateHeartRate', 'HealthRecordController@updateHeartRate');
Route::post('/deleteHeartRate', 'HealthRecordController@deleteHeartRate');
Route::post('/AddFamilyHealthInfo', 'HealthRecordController@AddFamilyHealthInfo');
Route::post('/deleteFamilyHealthItem', 'HealthRecordController@deleteFamilyHealthItem');
Route::post('/updateFamilyHealthItem', 'HealthRecordController@updateFamilyHealthItem');
Route::post('/AddMedicalHealthHistoryItem', 'HealthRecordController@AddMedicalHealthHistoryItem');
Route::post('/updateMedicalHealthHistory', 'HealthRecordController@updateMedicalHealthHistory');
Route::post('/deleteMedicalHealthHistoryItem', 'HealthRecordController@deleteMedicalHealthHistoryItem');
Route::post('/AddSurgeryHistoryItem', 'HealthRecordController@AddSurgeryHistoryItem');
Route::post('/updateSurgeryHistory', 'HealthRecordController@updateSurgeryHistory');
Route::post('/deleteSurgeryHistory', 'HealthRecordController@deleteSurgeryHistory');
Route::post('/AddCardiovascularRiskFactorsInfo', 'HealthRecordController@AddCardiovascularRiskFactorsInfo');
Route::post('/updatePatientCardiovascularInfo', 'HealthRecordController@updatePatientCardiovascularInfo');
Route::post('/deletePatientCardiovascular', 'HealthRecordController@deletePatientCardiovascular');
Route::post('/updatePatientPrescriptionInfo', 'HealthRecordController@updatePatientPrescriptionInfo');
Route::post('/deletePatientPrescription', 'HealthRecordController@deletePatientPrescription');
Route::post('/AddDiagnosis', 'HealthRecordController@AddDiagnosis');
Route::post('/updatePatientDiagnosisInfo', 'HealthRecordController@updatePatientDiagnosisInfo');
Route::post('/deletePatientDiagnosis', 'HealthRecordController@deletePatientDiagnosis');
Route::post('/AddTestOrderInfo', 'HealthRecordController@AddTestOrderInfo');
Route::post('/updatePatientTestOrderInfo', 'HealthRecordController@updatePatientTestOrderInfo');
Route::post('/deletePatientTestOrder', 'HealthRecordController@deletePatientTestOrder');
Route::post('/AddProcedure', 'HealthRecordController@AddProcedure');
Route::post('/updatePatientProcedure', 'HealthRecordController@updatePatientProcedure');
Route::post('/deleteProcedure', 'HealthRecordController@deleteProcedure');
Route::post('/addNewHealthSession', 'HealthRecordController@addNewHealthSession');

