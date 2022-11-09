@extends('layouts.backend')

@section('content')
<div id="page" class="content clearfix">
	<section id="PatientsOptions" class="col-sm-12">
		<div class="row">
	  	<div class="PatientsOptionsHeader clearfix">
				<div class="col-xs-12 col-sm-6 SearchPatients">
				 <input type="search" name="PatientSearch" id="search" class="PatientSearch" value="" placeholder="Patient Name / ID">		
					<i class="fa fa-search" id="searchPatients" aria-hidden="true"></i>
			   </div>
			   <div class="col-xs-12 col-sm-6 PatientsMultipleOptions">
						<div class="col-sm-4 export"> 
          		<span class="glyphicon glyphicon-share-alt"></span>
							<span>Export</span>
					  </div>	
						<div class="col-sm-4 viewsOptions">
							<ul class="nav nav-pills">
								<li class="active"><a data-toggle="pill" href="#ListView">								
									<i class="fa fa-list-ul" aria-hidden="true"></i>
									<span>List View</span></a>
								</li>
								<li><a data-toggle="pill" href="#gridView">
									<i class="fa fa-th" aria-hidden="true"></i>
									<span>Grid View</span>
									</a>
								</li>
							</ul>
						</div>
					 
<!-- 					  <div class="col-sm-2 listView">
							<a href="#PatientsList">
								<i class="fa fa-list-ul" aria-hidden="true"></i>
								<span>List View</span>
							</a>
					  </div>
					  <div class="col-sm-2 gridView">
							<a href="#PatientsListing">
								<i class="fa fa-th" aria-hidden="true"></i>
								<span>Grid View</span>
							</a>
					  </div> -->
					  <div class="col-sm-4 AddPatient">
							<button type="button" data-toggle="modal" data-target="#AddPatientModal" class="AddPatientButton">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Add Patient
							</button>
					 </div>					
				</div>	
			</div>
    </div>
    <div class="row">
        <div class="col-sm-12 PatientsListHolder">
				 <div class="tab-content clearfix">
					  <div id="ListView" class="tab-pane fade in active">
							<table id="PatientsList" class="display" cellspacing="0" width="100%">
								<thead>
										<tr>
												<th>Patient Name / ID</th>
												<th>Age</th>
												<th>Gender</th>
												<th>Blood Type</th>
												<th>Marital Status</th>
												<th>Phone No.</th>
												<th>Address</th>
												<th></th>
										</tr>
								</thead>
								<tfoot>
										<tr>
												<th>Patient Name / ID</th>
												<th>Age</th>
												<th>Gender</th>
												<th>Blood Type</th>
												<th>Marital Status</th>
												<th>Phone No.</th>
												<th>Address</th>
												<th></th>
										</tr>
								</tfoot>
								<tbody>
									
										@foreach($patients as $patient)
											<tr>
												<td>						
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientId">#{{$patient->id}}</li>
																		<li class="PatientName">{{$patient->name}}</li>
																	</ul>
																</li>
															</ul>				
													</div>
												</td>
												<td>{{$patient->birthdate}}</td>
												<td>{{$patient->gender}}</td>
												<td>{{$patient->blood_type}}</td>
												<td>{{$patient->marital_status}}</td>
												<td>{{$patient->tel}}</td>
												<td>{{$patient->address}}</td>
												<td><a href="profile/{{$patient->id}}" class="ViewProfile">View Profile</a></td>
										</tr>
									@endforeach
									
									
<!-- 										<tr>
												<td>						
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr>
										<tr>
												<td>
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki Adonis</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr>
										<tr>
												<td>
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki Abou Zaki</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr>
							      <tr>
												<td>
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki Abou Zaki</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr>
							      <tr>
												<td>
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki Abou Zaki</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr>
			             	<tr>
												<td>
													<div class="PatientInfo clearfix">
															<ul class="list-inline">
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																<li>
																	<ul>
																		<li class="PatientName">Adonis Abou Zaki Abou Zaki</li>
																		<li class="PatientId">#3204</li>
																	</ul>
																</li>
															</ul>				
													</div>
													</div>
												</td>
												<td>45 years</td>
												<td>Male</td>
												<td>AB+</td>
												<td>Married</td>
												<td>000 000 00 961+</td>
												<td>Zalka, Beirut...</td>
												<td><a href="profile" class="ViewProfile">View Profile</a></td>
										</tr> -->
										</tbody>
							</table>
						</div>
						<div id="gridView" class="tab-pane fade">
							<table id="PatientsListGridView" class="display" cellspacing="0" width="100%">
								 <thead>
										<tr>
												<th>Patient Photo</th>
												<th>Id</th>
												<th>Name</th>
												<th>Birthdate</th>
												<th>Blood Type</th>
											  <th></th>
												<th>Phone No.</th>												
												<th>Address</th>
												<th></th>
										</tr>
								</thead>
								<tfoot>
										<tr>
												<th>Patient Photo</th>
												<th>Id</th>
												<th>Name</th>
												<th>Birthdate</th>
												<th>Blood Type</th>
											  <th></th>
												<th>Phone No.</th>												
												<th>Address</th>
												<th></th>
										</tr>
								</tfoot>
								<tbody>
										@foreach($patients as $patient)
											<tr>
												<td><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></td>
												<td><a href="profile/{{$patient->id}}" class="ViewProfile">View Profile</a></td>
												<td class="PatientId">#{{$patient->id}}</td>
												<td class="PatientName">{{$patient->name}}</td>
												<td class="PatientAgeGender">{{$patient->birthdate}} , {{$patient->gender}}</td>
												<td class="PatientBloodType">Blood Type: {{$patient->blood_type}}</td>
												<td><hr /></td>
												<td class="PatientMobile">{{$patient->tel}}</td>
												<td class="PatientEmailAddress">{{$patient->address}}</td>											
										  </tr>
									  @endforeach
								</tbody>
							</table>
													
    					<section id="PatientsListing" class="col-sm-12">	
									<div class="row">
<!-- 										@foreach($patients as $patient)
												<div class="PatientOutline vertical col-xs-12 col-sm-2">
													<div class="panel">
														<div class="panel-body">
															<div class="PatientAbstract PatientAbstractWrap">
																<ul>
																	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
																	<li>View Profile</li>
																	<li class="PatientId">#{{$patient->id}}</li>
																	<li class="PatientName">{{$patient->name}}</li>
																	<li class="PatientAgeGender">{{$patient->birthdate}} , {{$patient->gender}}</li>
																	<li class="PatientBloodType">Blood Type: {{$patient->blood_type}}</li>
																	<li><hr></li>
																	<li class="PatientMobile">{{$patient->tel}}</li>
																	<li class="PatientEmailAddress">{{$patient->email}}</li>
																</ul>					
													    </div>
														</div>
													</div>
												</div>
											@endforeach -->
										
										
										
<!--  										<div class="PatientOutline vertical col-xs-12 col-sm-2">
											<div class="panel">
												<div class="panel-body">
													<div class="PatientAbstract PatientAbstractWrap">
														<ul>
															<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
															<li>View Profile</li>
															<li class="PatientId">#3204</li>
															<li class="PatientName">Adonis Abou Zaki</li>
															<li class="PatientAgeGender">45 years , Male</li>
															<li class="PatientBloodType">Blood Type: O-</li>
															<li><hr></li>
															<li class="PatientMobile">+961 00 000 000</li>
															<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
														</ul>					
											</div>
										</div>
									</div>
								</div> -->
				<!--						<div class="PatientOutline vertical col-xs-12 col-sm-2">
											<div class="panel">
																	<div class="panel-body">
																			<div class="PatientAbstract PatientAbstractWrap">
												<ul>
													<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
													<li>View Profile</li>
													<li class="PatientId">#3204</li>
													<li class="PatientName">Adonis Abou Zaki</li>
													<li class="PatientAgeGender">45 years , Male</li>
													<li class="PatientBloodType">Blood Type: O-</li>
													<li><hr></li>
													<li class="PatientMobile">+961 00 000 000</li>
													<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
												</ul>					
											</div>
										</div>
									</div>
								</div>
										<div class="PatientOutline vertical col-xs-12 col-sm-2">
									<div class="panel">
										<div class="panel-body">
											<div class="PatientAbstract PatientAbstractWrap">
												<ul>
													<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
													<li>View Profile</li>
													<li class="PatientId">#3204</li>
													<li class="PatientName">Adonis Abou Zaki</li>
													<li class="PatientAgeGender">45 years , Male</li>
													<li class="PatientBloodType">Blood Type: O-</li>
													<li><hr></li>
													<li class="PatientMobile">+961 00 000 000</li>
													<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
												</ul>					
											</div>
										</div>
									 </div>
									</div>
										<div class="PatientOutline vertical col-xs-12 col-sm-2">
									<div class="panel">
										<div class="panel-body">
											<div class="PatientAbstract PatientAbstractWrap">
												<ul>
													<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
													<li>View Profile</li>
													<li class="PatientId">#3204</li>
													<li class="PatientName">Adonis Abou Zaki</li>
													<li class="PatientAgeGender">45 years , Male</li>
													<li class="PatientBloodType">Blood Type: O-</li>
													<li><hr></li>
													<li class="PatientMobile">+961 00 000 000</li>
													<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
												</ul>					
											</div>
										</div>
									 </div>
									</div>
										<div class="PatientOutline vertical col-xs-12 col-sm-2">
										<div class="panel">
											<div class="panel-body">
												<div class="PatientAbstract PatientAbstractWrap">
												<ul>
													<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
													<li>View Profile</li>
													<li class="PatientId">#3204</li>
													<li class="PatientName">Adonis Abou Zaki</li>
													<li class="PatientAgeGender">45 years , Male</li>
													<li class="PatientBloodType">Blood Type: O-</li>
													<li><hr></li>
													<li class="PatientMobile">+961 00 000 000</li>
													<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
												</ul>					
											</div>
										</div>
									 </div>
									</div>
										<div class="PatientOutline vertical col-xs-12 col-sm-2">
										<div class="panel">
											<div class="panel-body">
												<div class="PatientAbstract PatientAbstractWrap">
												<ul>
													<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
													<li>View Profile</li>
													<li class="PatientId">#3204</li>
													<li class="PatientName">Adonis Abou Zaki</li>
													<li class="PatientAgeGender">45 years , Male</li>
													<li class="PatientBloodType">Blood Type: O-</li>
													<li><hr></li>
													<li class="PatientMobile">+961 00 000 000</li>
													<li class="PatientEmailAddress">a.abouzaki@i-limits.com</li>
												</ul>					
											</div>
												</div>
										 </div>

										</div> -->
									</div>			
							</section>
            </div>           
        </div>
    </div>
</div>		
		</div>
	</section>

  <div class="modal fade" id="AddPatientModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Patient</h4>
        </div>
        <div class="modal-body">
          	<section id="AddPatientForm" class="col-sm-12">
        			<div  id="AddPatientPanel">
 									{{ Form::open(array('id' => 'AddNewPatientForm', 'role' => 'form')) }}
									 <div class="row">
										<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="firstName">First name:</label> -->
<!-- 											<div class="col-sm-9"> -->
											<input type="text" id="firstName" name="PatientFirstName" class="form-control" placeholder='First Name *' >
											 <span class="error"></span>
<!-- 											</div> -->
										</div>
								</div>
									 <div class="row">
										<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="lastName">Last name:</label> -->
<!-- 												<div class="col-sm-9"> -->
											<input type="text" id="lastName" name="PatientLastName"  class="form-control" placeholder='Last Name *'>
											 <span class="error"></span>
<!-- 											</div> -->
										</div>
									</div>
									 <div class="row">
										<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="BirthDate">Date of Birth:</label> -->
<!-- 											<div class="col-sm-9"> -->
																			<div class='input-group date' >
																					<input type='text' class="form-control" id='birthdateTimePicker' name="birthdateTimePicker" placeholder='Date of Birth *'/>
																					<span class="input-group-addon" onclick="fireDatePicker('birthdateTimePicker')">
																							<span class="glyphicon glyphicon-calendar">
																							</span>
																					</span>
																			</div>
<!-- 											</div> -->
										</div>
								   </div>
									 <div class="row">
										<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3">Gender:</label> -->
<!-- 												<div class="col-sm-4 genderOption"> -->
											
												<div class="EventClassColors genderColors"><ul class="list-unstyled clearfix">
				<li class="genderOption"><input type="radio" name="gender" id="eventClassPurpleColor" class="gender" value="Male" data-color="#7F7CAF" checked><label for="eventClassPurpleColor">Male</label> <div class="check"><div class="inside"></div></div></li>
				<li class="genderOption"><input type="radio" name="gender" id="eventClassPinkColor" class="gender" value="Female" data-color="#EE6352"><label for="eventClassPinkColor">Female</label><div class="check"></div></li>
													</ul>
				</div>
													
<!-- 												<div class="col-sm-6 genderOption">
											 <input type="radio" name="gender" value="Male" class="gender" checked> Male<br>
											</div>
											<div class="col-sm-6 genderOption">
											 <input type="radio" name="gender" class="gender" value="Female"> Female<br>
											</div> -->
										</div>
									</div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 												<label class="control-label col-sm-3" for="email">E-mail:</label> -->
<!-- 													<div class="col-sm-9"> -->
															 <input type="text" id="PatientEmailAddress" name="PatientEmailAddress" class="form-control" placeholder='E-mail'>
												 <span class="error"> </span>
<!-- 												</div> -->
											</div>
								   </div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 												<label class="control-label col-sm-3" for="phoneNo">Phone No:</label>
												<div class="col-sm-9"> -->
												<input type="text" id="PatientPhoneNo" name="PatientPhoneNo" class="form-control" placeholder='Phone No *' maxlength="8">
												 <span class="error"> </span>
												</div>
<!-- 											</div> -->
										</div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 												<label class="control-label col-sm-3" for="address">Address:</label>
												<div class="col-sm-9"> -->
													<textarea class="form-control" rows="2" id="PatientAddress" name="PatientAddress" placeholder='Address'></textarea>
												</div>
<!-- 											</div> -->
										</div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="PatientBloodType">Blood Type:</label>
											 <div class="col-sm-9"> -->
												<select class="form-control" id="PatientBloodType" name="PatientBloodType" placeholder='Blood Type'>
													<option value=""> - select a Blood Type - </option>
													<option>O-</option>
													<option>O+</option>
													<option>A-</option>
													<option>A+</option>
													<option>B-</option>
													<option>B+</option>
													<option>AB-</option>
													<option>AB+</option>
												</select>
												</div>
<!-- 										</div> -->
										</div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="PatientBloodType">Nationality:</label>
											 <div class="col-sm-9">					 -->
 													<select class="form-control" name="PatientNationality" placeholder='Nationality'>
<!-- 																			<option disabled selected value> -- select an option -- </option> -->
												<option value="">- select a Nationality -</option>
														<option value="afghan">Afghan</option>
														<option value="albanian">Albanian</option>
														<option value="algerian">Algerian</option>
														<option value="american">American</option>
														<option value="andorran">Andorran</option>
														<option value="angolan">Angolan</option>
														<option value="antiguans">Antiguans</option>
														<option value="argentinean">Argentinean</option>
														<option value="armenian">Armenian</option>
														<option value="australian">Australian</option>
														<option value="austrian">Austrian</option>
														<option value="azerbaijani">Azerbaijani</option>
														<option value="bahamian">Bahamian</option>
														<option value="bahraini">Bahraini</option>
														<option value="bangladeshi">Bangladeshi</option>
														<option value="barbadian">Barbadian</option>
														<option value="barbudans">Barbudans</option>
														<option value="batswana">Batswana</option>
														<option value="belarusian">Belarusian</option>
														<option value="belgian">Belgian</option>
														<option value="belizean">Belizean</option>
														<option value="beninese">Beninese</option>
														<option value="bhutanese">Bhutanese</option>
														<option value="bolivian">Bolivian</option>
														<option value="bosnian">Bosnian</option>
														<option value="brazilian">Brazilian</option>
														<option value="british">British</option>
														<option value="bruneian">Bruneian</option>
														<option value="bulgarian">Bulgarian</option>
														<option value="burkinabe">Burkinabe</option>
														<option value="burmese">Burmese</option>
														<option value="burundian">Burundian</option>
														<option value="cambodian">Cambodian</option>
														<option value="cameroonian">Cameroonian</option>
														<option value="canadian">Canadian</option>
														<option value="cape verdean">Cape Verdean</option>
														<option value="central african">Central African</option>
														<option value="chadian">Chadian</option>
														<option value="chilean">Chilean</option>
														<option value="chinese">Chinese</option>
														<option value="colombian">Colombian</option>
														<option value="comoran">Comoran</option>
														<option value="congolese">Congolese</option>
														<option value="costa rican">Costa Rican</option>
														<option value="croatian">Croatian</option>
														<option value="cuban">Cuban</option>
														<option value="cypriot">Cypriot</option>
														<option value="czech">Czech</option>
														<option value="danish">Danish</option>
														<option value="djibouti">Djibouti</option>
														<option value="dominican">Dominican</option>
														<option value="dutch">Dutch</option>
														<option value="east timorese">East Timorese</option>
														<option value="ecuadorean">Ecuadorean</option>
														<option value="egyptian">Egyptian</option>
														<option value="emirian">Emirian</option>
														<option value="equatorial guinean">Equatorial Guinean</option>
														<option value="eritrean">Eritrean</option>
														<option value="estonian">Estonian</option>
														<option value="ethiopian">Ethiopian</option>
														<option value="fijian">Fijian</option>
														<option value="filipino">Filipino</option>
														<option value="finnish">Finnish</option>
														<option value="french">French</option>
														<option value="gabonese">Gabonese</option>
														<option value="gambian">Gambian</option>
														<option value="georgian">Georgian</option>
														<option value="german">German</option>
														<option value="ghanaian">Ghanaian</option>
														<option value="greek">Greek</option>
														<option value="grenadian">Grenadian</option>
														<option value="guatemalan">Guatemalan</option>
														<option value="guinea-bissauan">Guinea-Bissauan</option>
														<option value="guinean">Guinean</option>
														<option value="guyanese">Guyanese</option>
														<option value="haitian">Haitian</option>
														<option value="herzegovinian">Herzegovinian</option>
														<option value="honduran">Honduran</option>
														<option value="hungarian">Hungarian</option>
														<option value="icelander">Icelander</option>
														<option value="indian">Indian</option>
														<option value="indonesian">Indonesian</option>
														<option value="iranian">Iranian</option>
														<option value="iraqi">Iraqi</option>
														<option value="irish">Irish</option>
														<option value="israeli">Israeli</option>
														<option value="italian">Italian</option>
														<option value="ivorian">Ivorian</option>
														<option value="jamaican">Jamaican</option>
														<option value="japanese">Japanese</option>
														<option value="jordanian">Jordanian</option>
														<option value="kazakhstani">Kazakhstani</option>
														<option value="kenyan">Kenyan</option>
														<option value="kittian and nevisian">Kittian and Nevisian</option>
														<option value="kuwaiti">Kuwaiti</option>
														<option value="kyrgyz">Kyrgyz</option>
														<option value="laotian">Laotian</option>
														<option value="latvian">Latvian</option>
														<option value="lebanese">Lebanese</option>
														<option value="liberian">Liberian</option>
														<option value="libyan">Libyan</option>
														<option value="liechtensteiner">Liechtensteiner</option>
														<option value="lithuanian">Lithuanian</option>
														<option value="luxembourger">Luxembourger</option>
														<option value="macedonian">Macedonian</option>
														<option value="malagasy">Malagasy</option>
														<option value="malawian">Malawian</option>
														<option value="malaysian">Malaysian</option>
														<option value="maldivan">Maldivan</option>
														<option value="malian">Malian</option>
														<option value="maltese">Maltese</option>
														<option value="marshallese">Marshallese</option>
														<option value="mauritanian">Mauritanian</option>
														<option value="mauritian">Mauritian</option>
														<option value="mexican">Mexican</option>
														<option value="micronesian">Micronesian</option>
														<option value="moldovan">Moldovan</option>
														<option value="monacan">Monacan</option>
														<option value="mongolian">Mongolian</option>
														<option value="moroccan">Moroccan</option>
														<option value="mosotho">Mosotho</option>
														<option value="motswana">Motswana</option>
														<option value="mozambican">Mozambican</option>
														<option value="namibian">Namibian</option>
														<option value="nauruan">Nauruan</option>
														<option value="nepalese">Nepalese</option>
														<option value="new zealander">New Zealander</option>
														<option value="ni-vanuatu">Ni-Vanuatu</option>
														<option value="nicaraguan">Nicaraguan</option>
														<option value="nigerien">Nigerien</option>
														<option value="north korean">North Korean</option>
														<option value="northern irish">Northern Irish</option>
														<option value="norwegian">Norwegian</option>
														<option value="omani">Omani</option>
														<option value="pakistani">Pakistani</option>
														<option value="palauan">Palauan</option>
														<option value="panamanian">Panamanian</option>
														<option value="papua new guinean">Papua New Guinean</option>
														<option value="paraguayan">Paraguayan</option>
														<option value="peruvian">Peruvian</option>
														<option value="polish">Polish</option>
														<option value="portuguese">Portuguese</option>
														<option value="qatari">Qatari</option>
														<option value="romanian">Romanian</option>
														<option value="russian">Russian</option>
														<option value="rwandan">Rwandan</option>
														<option value="saint lucian">Saint Lucian</option>
														<option value="salvadoran">Salvadoran</option>
														<option value="samoan">Samoan</option>
														<option value="san marinese">San Marinese</option>
														<option value="sao tomean">Sao Tomean</option>
														<option value="saudi">Saudi</option>
														<option value="scottish">Scottish</option>
														<option value="senegalese">Senegalese</option>
														<option value="serbian">Serbian</option>
														<option value="seychellois">Seychellois</option>
														<option value="sierra leonean">Sierra Leonean</option>
														<option value="singaporean">Singaporean</option>
														<option value="slovakian">Slovakian</option>
														<option value="slovenian">Slovenian</option>
														<option value="solomon islander">Solomon Islander</option>
														<option value="somali">Somali</option>
														<option value="south african">South African</option>
														<option value="south korean">South Korean</option>
														<option value="spanish">Spanish</option>
														<option value="sri lankan">Sri Lankan</option>
														<option value="sudanese">Sudanese</option>
														<option value="surinamer">Surinamer</option>
														<option value="swazi">Swazi</option>
														<option value="swedish">Swedish</option>
														<option value="swiss">Swiss</option>
														<option value="syrian">Syrian</option>
														<option value="taiwanese">Taiwanese</option>
														<option value="tajik">Tajik</option>
														<option value="tanzanian">Tanzanian</option>
														<option value="thai">Thai</option>
														<option value="togolese">Togolese</option>
														<option value="tongan">Tongan</option>
														<option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
														<option value="tunisian">Tunisian</option>
														<option value="turkish">Turkish</option>
														<option value="tuvaluan">Tuvaluan</option>
														<option value="ugandan">Ugandan</option>
														<option value="ukrainian">Ukrainian</option>
														<option value="uruguayan">Uruguayan</option>
														<option value="uzbekistani">Uzbekistani</option>
														<option value="venezuelan">Venezuelan</option>
														<option value="vietnamese">Vietnamese</option>
														<option value="welsh">Welsh</option>
														<option value="yemenite">Yemenite</option>
														<option value="zambian">Zambian</option>
														<option value="zimbabwean">Zimbabwean</option>
												</select>
<!-- 												  <select class="selectpicker" name="PatientNationality" placeholder='Nationality' data-show-subtext="true" data-live-search="true">
													<option value="">- select a Nationality -</option>
														<option value="afghan">Afghan</option>
														<option value="albanian">Albanian</option>
														<option value="algerian">Algerian</option>
														<option value="american">American</option>
														<option value="andorran">Andorran</option>
														<option value="angolan">Angolan</option>
														<option value="antiguans">Antiguans</option>
														<option value="argentinean">Argentinean</option>
														<option value="armenian">Armenian</option>
														<option value="australian">Australian</option>
														<option value="austrian">Austrian</option>
														<option value="azerbaijani">Azerbaijani</option>
														<option value="bahamian">Bahamian</option>
														<option value="bahraini">Bahraini</option>
														<option value="bangladeshi">Bangladeshi</option>
														<option value="barbadian">Barbadian</option>
														<option value="barbudans">Barbudans</option>
														<option value="batswana">Batswana</option>
														<option value="belarusian">Belarusian</option>
														<option value="belgian">Belgian</option>
														<option value="belizean">Belizean</option>
														<option value="beninese">Beninese</option>
														<option value="bhutanese">Bhutanese</option>
														<option value="bolivian">Bolivian</option>
														<option value="bosnian">Bosnian</option>
														<option value="brazilian">Brazilian</option>
														<option value="british">British</option>
														<option value="bruneian">Bruneian</option>
														<option value="bulgarian">Bulgarian</option>
														<option value="burkinabe">Burkinabe</option>
														<option value="burmese">Burmese</option>
														<option value="burundian">Burundian</option>
														<option value="cambodian">Cambodian</option>
														<option value="cameroonian">Cameroonian</option>
														<option value="canadian">Canadian</option>
														<option value="cape verdean">Cape Verdean</option>
														<option value="central african">Central African</option>
														<option value="chadian">Chadian</option>
														<option value="chilean">Chilean</option>
														<option value="chinese">Chinese</option>
														<option value="colombian">Colombian</option>
														<option value="comoran">Comoran</option>
														<option value="congolese">Congolese</option>
														<option value="costa rican">Costa Rican</option>
														<option value="croatian">Croatian</option>
														<option value="cuban">Cuban</option>
														<option value="cypriot">Cypriot</option>
														<option value="czech">Czech</option>
														<option value="danish">Danish</option>
														<option value="djibouti">Djibouti</option>
														<option value="dominican">Dominican</option>
														<option value="dutch">Dutch</option>
														<option value="east timorese">East Timorese</option>
														<option value="ecuadorean">Ecuadorean</option>
														<option value="egyptian">Egyptian</option>
														<option value="emirian">Emirian</option>
														<option value="equatorial guinean">Equatorial Guinean</option>
														<option value="eritrean">Eritrean</option>
														<option value="estonian">Estonian</option>
														<option value="ethiopian">Ethiopian</option>
														<option value="fijian">Fijian</option>
														<option value="filipino">Filipino</option>
														<option value="finnish">Finnish</option>
														<option value="french">French</option>
														<option value="gabonese">Gabonese</option>
														<option value="gambian">Gambian</option>
														<option value="georgian">Georgian</option>
														<option value="german">German</option>
														<option value="ghanaian">Ghanaian</option>
														<option value="greek">Greek</option>
														<option value="grenadian">Grenadian</option>
														<option value="guatemalan">Guatemalan</option>
														<option value="guinea-bissauan">Guinea-Bissauan</option>
														<option value="guinean">Guinean</option>
														<option value="guyanese">Guyanese</option>
														<option value="haitian">Haitian</option>
														<option value="herzegovinian">Herzegovinian</option>
														<option value="honduran">Honduran</option>
														<option value="hungarian">Hungarian</option>
														<option value="icelander">Icelander</option>
														<option value="indian">Indian</option>
														<option value="indonesian">Indonesian</option>
														<option value="iranian">Iranian</option>
														<option value="iraqi">Iraqi</option>
														<option value="irish">Irish</option>
														<option value="israeli">Israeli</option>
														<option value="italian">Italian</option>
														<option value="ivorian">Ivorian</option>
														<option value="jamaican">Jamaican</option>
														<option value="japanese">Japanese</option>
														<option value="jordanian">Jordanian</option>
														<option value="kazakhstani">Kazakhstani</option>
														<option value="kenyan">Kenyan</option>
														<option value="kittian and nevisian">Kittian and Nevisian</option>
														<option value="kuwaiti">Kuwaiti</option>
														<option value="kyrgyz">Kyrgyz</option>
														<option value="laotian">Laotian</option>
														<option value="latvian">Latvian</option>
														<option value="lebanese">Lebanese</option>
														<option value="liberian">Liberian</option>
														<option value="libyan">Libyan</option>
														<option value="liechtensteiner">Liechtensteiner</option>
														<option value="lithuanian">Lithuanian</option>
														<option value="luxembourger">Luxembourger</option>
														<option value="macedonian">Macedonian</option>
														<option value="malagasy">Malagasy</option>
														<option value="malawian">Malawian</option>
														<option value="malaysian">Malaysian</option>
														<option value="maldivan">Maldivan</option>
														<option value="malian">Malian</option>
														<option value="maltese">Maltese</option>
														<option value="marshallese">Marshallese</option>
														<option value="mauritanian">Mauritanian</option>
														<option value="mauritian">Mauritian</option>
														<option value="mexican">Mexican</option>
														<option value="micronesian">Micronesian</option>
														<option value="moldovan">Moldovan</option>
														<option value="monacan">Monacan</option>
														<option value="mongolian">Mongolian</option>
														<option value="moroccan">Moroccan</option>
														<option value="mosotho">Mosotho</option>
														<option value="motswana">Motswana</option>
														<option value="mozambican">Mozambican</option>
														<option value="namibian">Namibian</option>
														<option value="nauruan">Nauruan</option>
														<option value="nepalese">Nepalese</option>
														<option value="new zealander">New Zealander</option>
														<option value="ni-vanuatu">Ni-Vanuatu</option>
														<option value="nicaraguan">Nicaraguan</option>
														<option value="nigerien">Nigerien</option>
														<option value="north korean">North Korean</option>
														<option value="northern irish">Northern Irish</option>
														<option value="norwegian">Norwegian</option>
														<option value="omani">Omani</option>
														<option value="pakistani">Pakistani</option>
														<option value="palauan">Palauan</option>
														<option value="panamanian">Panamanian</option>
														<option value="papua new guinean">Papua New Guinean</option>
														<option value="paraguayan">Paraguayan</option>
														<option value="peruvian">Peruvian</option>
														<option value="polish">Polish</option>
														<option value="portuguese">Portuguese</option>
														<option value="qatari">Qatari</option>
														<option value="romanian">Romanian</option>
														<option value="russian">Russian</option>
														<option value="rwandan">Rwandan</option>
														<option value="saint lucian">Saint Lucian</option>
														<option value="salvadoran">Salvadoran</option>
														<option value="samoan">Samoan</option>
														<option value="san marinese">San Marinese</option>
														<option value="sao tomean">Sao Tomean</option>
														<option value="saudi">Saudi</option>
														<option value="scottish">Scottish</option>
														<option value="senegalese">Senegalese</option>
														<option value="serbian">Serbian</option>
														<option value="seychellois">Seychellois</option>
														<option value="sierra leonean">Sierra Leonean</option>
														<option value="singaporean">Singaporean</option>
														<option value="slovakian">Slovakian</option>
														<option value="slovenian">Slovenian</option>
														<option value="solomon islander">Solomon Islander</option>
														<option value="somali">Somali</option>
														<option value="south african">South African</option>
														<option value="south korean">South Korean</option>
														<option value="spanish">Spanish</option>
														<option value="sri lankan">Sri Lankan</option>
														<option value="sudanese">Sudanese</option>
														<option value="surinamer">Surinamer</option>
														<option value="swazi">Swazi</option>
														<option value="swedish">Swedish</option>
														<option value="swiss">Swiss</option>
														<option value="syrian">Syrian</option>
														<option value="taiwanese">Taiwanese</option>
														<option value="tajik">Tajik</option>
														<option value="tanzanian">Tanzanian</option>
														<option value="thai">Thai</option>
														<option value="togolese">Togolese</option>
														<option value="tongan">Tongan</option>
														<option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
														<option value="tunisian">Tunisian</option>
														<option value="turkish">Turkish</option>
														<option value="tuvaluan">Tuvaluan</option>
														<option value="ugandan">Ugandan</option>
														<option value="ukrainian">Ukrainian</option>
														<option value="uruguayan">Uruguayan</option>
														<option value="uzbekistani">Uzbekistani</option>
														<option value="venezuelan">Venezuelan</option>
														<option value="vietnamese">Vietnamese</option>
														<option value="welsh">Welsh</option>
														<option value="yemenite">Yemenite</option>
														<option value="zambian">Zambian</option>
														<option value="zimbabwean">Zimbabwean</option>
												</select> -->
												</div>
<!-- 										</div> -->
										</div>
									 <div class="row">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="PatientMaritalStatus">Marital Status:</label>
												 <div class="col-sm-9"> -->
												<select class="form-control" id="PatientMaritalStatus" name="PatientMaritalStatus">
													<option value=""> - select a Marital Status - </option>
													<option>single</option>
													<option>married</option>
													<option>divorced</option>
													<option>widowed</option>
													<option>other</option>
												</select>
												</div>
<!-- 										</div> -->
								    </div>
									 <div class="row">
										<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="patientEducationalLevel">Educational Level:</label>
											<div class="col-sm-9"> -->
												<textarea class="form-control" rows="3" id="patientEducationalLevel" name="patientEducationalLevel" placeholder='Educational Level'></textarea>
											</div>
<!-- 										</div> -->
								</div>
										<div class="row">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3">Occupation:</label>
												<div class="col-sm-9"> -->
															 <input type="text" id="PatientOccupation" name="PatientOccupation" class="form-control" placeholder='Occupation'>
												</div>
<!-- 										</div> -->
								    </div>
										<div class="row">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3">Reference:</label>
												<div class="col-sm-9"> -->
															 <input type="text" id="PatientReference" name="PatientReference" class="form-control" placeholder='Reference'>
												 <span class="error"> </span>
												</div>
<!-- 										</div> -->
								    </div>
<!-- 										<div class="row">
										<div class="col-sm-12 form-group">
											<label class="control-label col-sm-3">Insured?</label>
												<div class="col-sm-4 insuranceOption">
											 <input type="radio" name="insured" value="0" class="insured" checked onclick='closeInsuranceCompaniesList(this)'>No<br>
											</div>
											<div class="col-sm-5 genderOption">
											 <input type="radio" name="insured" value="1" class="insured" onclick='openInsuranceCompaniesList(this)'>Yes<br>
											</div>
										</div>
									</div> -->
									<div class="row">
										<div class="col-sm-12 form-group">
													<div class="InsuranceClassColors insuranceTheme"><ul class="list-unstyled clearfix">
				<li class="insuranceOption"><input type="radio" name="insured" id="eventClassYellowLightColor" value="0" data-color="#87BBA2" checked onclick='closeInsuranceCompaniesList(this)'><label for="eventClassYellowLightColor">Not Insured</label> <div class="check"><div class="inside"></div></div></li>
				<li class="insuranceOption"><input type="radio" name="insured" id="eventClassGreenColor" value="1" data-color="#d9d9ff" onclick='openInsuranceCompaniesList(this)'><label for="eventClassGreenColor">Insured</label> <div class="check insured"><div class="inside"></div></div></li>
				</div>
<!-- 												<div class="col-sm-6 insuranceOption">
											 <input type="radio" name="insured" value="0" class="insured" checked onclick='closeInsuranceCompaniesList(this)'>Not Insured<br>
											</div>
											<div class="col-sm-6 genderOption">
											 <input type="radio" name="insured" value="1" class="insured" onclick='openInsuranceCompaniesList(this)'>Insured<br>
											</div> -->
										</div>
									</div>
										<div class="row insuranceCompaniesRow">
											<div class="col-sm-12 form-group">
<!-- 											<label class="control-label col-sm-3" for="insuranceCompanyName">Insurance Company:</label>
											 <div class="col-sm-9"> -->
												<select class="form-control" id="insuranceCompanyName" name="insuranceCompanyName">
													<option disabled selected value> - select an Insurance Company - </option>
													@foreach($insuranceCompanies as $insuranceCompany)
													<option>{{$insuranceCompany -> name}}</option>
													@endforeach
												</select>
												</div>
<!-- 										</div> -->
									</div>
									  <div class="row text-right AddPatientFormFooter">
											<button class="cancel btn btn-default" type="button" data-dismiss="modal">Cancel</button>
											<button class="add btn btn-primary" type="submit">Add</button>						
										</div>
           			  {{ Form::close() }}	
							</div>
						</section>
        </div>
        <div class="modal-footer">
<!--           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
</div>

    <script type="text/javascript">
			
      $(function () {
				$("#birthdateTimePicker").datepicker({
						autoclose: true, 
						startView:2,
					  showAnim: "fadeIn",
					showButtonPanel: true
					});
				
					 oTable = $('#PatientsListGridView').DataTable( {
             "pagingType": "full_numbers",
				     "order": [[ 0, "desc" ]],
						 "aaSortingFixed": [[0,'desc']]
// 						 "aaSorting": [[0,'desc']]
// 						paging:true,
// 						 dom: 't'  
// 						 "bFilter":false,
// 						 "dom": '<"top"i>rt<"bottom"flp><"clear">'
    } );	
					 lTable = $('#PatientsList').DataTable( {
             "pagingType": "full_numbers",
				     "order": [[ 0, "desc" ]],
						 "aaSortingFixed": [[0,'desc']]
// 						 "aaSorting": [[0,'desc']]
// 						paging:true,
// 						 dom: 't'  
// 						 "bFilter":false,
// 						 "dom": '<"top"i>rt<"bottom"flp><"clear">'
    } );		
// 				gtable = $('#PatientsListGridView').DataTable();		
			 $('#search').keyup(function(){
					 oTable.search($(this).val()).draw() ;
					 lTable.search($(this).val()).draw() ;				 
        })	
					
				$('#AddNewPatientForm').submit(function(ev){ 	
						ev.preventDefault();
						$.ajax({
							type:'post',
							url:"{{url('/addNewPatient')}}",
							data:$('#AddNewPatientForm').serialize(),
							cache: false,
							success:function(data){
								var result = JSON.parse(data);							
// 								console.log(result);
 								if(result.result==0){ 
									if( !$('#firstName').val() ) {$("#firstName").css('border-color', 'red'); } 
									else if (result.nameErr =='firstname'){$('#firstName + .error').html('* Only letters and white space allowed');}
									else if (result.nameErr =='firstnameLength'){$('#firstName + .error').html('* minimum First Name input required 3 letters');}
									else if( !$('#lastName').val() ) { $("#lastName").css('border-color', 'red'); } 
									else if (result.nameErr =='lastname'){ $('#lastName + .error').html('* Only letters and white space allowed');}
									else if (result.nameErr =='lastnameLength'){ $('#lastName + .error').html('* minimum Last Name input required 3 letters');}
									else if( !$('#birthdateTimePicker').val() ) { $("#birthdateTimePicker").css('border-color', 'red');  }
									else if (result.nameErr =='email'){$('#PatientEmailAddress + .error').html('* Invalid email format');}
									else if( !$('#PatientPhoneNo').val() ) {$("#PatientPhoneNo").css('border-color', 'red'); }
									else if (result.nameErr =='tel'){$('#PatientPhoneNo + .error').html('* Only numbers allowed');}
									else if (result.nameErr =='phone'){$('#PatientPhoneNo + .error').html('* minimum phone input required 8 digits');}
									else if (result.nameErr =='reference'){$('#PatientReference + .error').html('* Only letters and white space allowed');}
											else {
												 if ($('#insuranceCompanyName option:selected').attr('disabled')) {
												 $("#insuranceCompanyName").css('border-color', 'red');
											}
										}
								} else { 
// 								 alert("new item to be added");
								 $('#AddPatientModal').modal('hide');
									closeInsuranceCompaniesList('.insuranceTheme');
									$('.error').html('');
// 								 var table = $('#PatientsList').DataTable( {
//              "pagingType": "full_numbers",
// 				     "order": [[ 0, "desc" ]]
//   				  } );		
								var rowNodeList = lTable.row.add([ '	<div class="PatientInfo clearfix">'+
															'<ul class="list-inline">'+
																	'<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>'+
																'<li>'+
																	'<ul>'+
																		'<li class="PatientId">#'+result.NewPatientId+'</li>'+
																		'<li class="PatientName">'+$("#firstName").val()+' '+$("#lastName").val()+'</li>'+
																	'</ul>'+
																'</li>'+
															'</ul>'+				
													'</div>',
													$("#birthdateTimePicker").val(), 
													$("input[name=\'gender\']:checked").val(), 
													$("#PatientBloodType").val(), 
													$("#PatientMaritalStatus").val(),
											    $("#PatientPhoneNo").val(), 
													$("#PatientAddress").val(), 
													'<a href="profile/'+result.NewPatientId+'" class="ViewProfile">View Profile</a>']).order( [[ 0, 'desc' ]] ).draw(false).node();
									$( rowNodeList ).css( 'color', 'red' ).animate( { color: 'black' } );
									
// 									   var row = $('<tr>');
//         row.append('<td>added row</td>')
//             .append('<td>Test ' + (i++) + '</td>')
//             .append('<td>123</td>')
//             .append('<td>2014-05-09</td>')
//             .append('<td>No</td>')
//             .append('<td>blub</td>')
// 									.append('<td>blub</td>')
// 									.append('<td>blub</td>')

//     var newRow = lTable.row.add(row);
//     $('#PatientsList tbody').prepend(newRow);
									
								 var rowNode = oTable.row.add([ "<i id='PatientPhoto' class='fa fa-user-circle' aria-hidden='true'></i>",
																							 "<a href='profile/"+result.NewPatientId+"' class='ViewProfile'>View Profile</a>", 
																							 "<span class='PatientId'>#"+result.NewPatientId+"</span>", 
																							 "<span class='PatientName'>"+$('#firstName').val()+" "+$('#lastName').val()+"</span>", 
																							 "<span class='PatientAgeGender'>"+$('#birthdateTimePicker').val()+" ,"+$('input[name=\'gender\']:checked').val()+"</span>",
																							 "<span class='PatientBloodType'>Blood Type: "+$('#PatientBloodType').val()+"</span>", 
																							 "<hr />", 
																							 "<span class='PatientMobile'>"+$('#PatientPhoneNo').val()+"</span>", 
																							 "<span class='PatientEmailAddress'>"+$('#PatientAddress').val()+"</span>"]).order( [[ 0, 'desc' ]] ).draw();				
		 $('#search').keyup(function(){
 			 oTable.search($(this).val()).draw() ;       
			 lTable.search($(this).val()).draw() ;			 
     })		
									// 	var jRow = $("#PatientsList tbody").prepend('<td></td>');
// table.row.add(jRow).draw();								
// 								 $("#PatientsList tbody").prepend("<tr role='row'>" +
// 												"<td>"+					
// 													"<div class='PatientInfo clearfix'>"+
// 															"<ul class='list-inline'>"+
// 																	"<li><i id='PatientPhoto' class='fa fa-user-circle' aria-hidden='true'></i></li>"+
// 																"<li>"+
// 																	"<ul>"+
// 																		"<li class='PatientId'>"+result.NewPatientId+"</li>"+
// 																		"<li class='PatientName'>"+$('#firstName').val()+" "+$('#lastName').val()+"</li>"+
// 																	"</ul>"+
// 																"</li>"+
// 															"</ul>"+				
// 													"</div>"+
// 												"</td>"+
// 												"<td>"+$('#birthdateTimePicker').val()+"</td>"+
// 											  "<td>"+$('input[name=\'gender\']:checked').val()+"</td>"+
// 												"<td>"+$('#PatientBloodType').val()+"</td>"+
// 												"<td>"+$('#PatientMaritalStatus').val()+"</td>"+
// 												"<td>"+$('#PatientPhoneNo').val()+"</td>"+
// 												"<td>"+$('#PatientAddress').val()+"</td>"+
// 												"<td><a href='profile' class='ViewProfile'>View Profile</a></td>"+
// 										"</tr>");
// 									$("#PatientsListGridView tbody").prepend("<tr role='row'>"+
// 												"<td><i id='PatientPhoto' class='fa fa-user-circle' aria-hidden='true'></i></td>"+
// 												"<td><a href='profile' class='ViewProfile'>View Profile</a></td>"+
// 												"<td class='PatientId'>"+result.NewPatientId+"</td>"+
// 												"<td class='PatientName'>"+$('#firstName').val()+" "+$('#lastName').val()+"</td>"+
// 												"<td class='PatientAgeGender'>"+$('#birthdateTimePicker').val()+" ,"+$('input[name=\'gender\']:checked').val()+"</td>"+
// 												"<td class='PatientBloodType'>Blood Type: "+$('#PatientBloodType').val()+"</td>"+
// 												"<td><hr /></td>"+
// 												"<td class='PatientMobile'>"+$('#PatientPhoneNo').val()+"</td>"+
// 												"<td class='PatientEmailAddress'>"+$('#PatientAddress').val()+"</td>"+											
// 										"</tr>");
									$('#AddNewPatientForm')[0].reset();
 							 }
							},
						}); 	
  }) 
					
	
				
			 $('#AddPatientModal').on('hidden.bs.modal', function (e) { 	
				    $('#AddNewPatientForm')[0].reset()
						$("#firstName, #lastName, #birthdateTimePicker, #PatientPhoneNo").css("border-color","#f2f2f2");})	
			});
			
		  function fireDatePicker(id){
// 					var showButtonPanel = $('#'+id ).parent().datepicker(  "option", "showAnim", "fadeIn");
					$('#'+id).datepicker("show"); 
			}
			
			function openInsuranceCompaniesList(el){
				     $(el).closest('.row').next().slideDown("300");
// 				     $(el).parent().parent().parent().next().show("300");
			}
			
			function closeInsuranceCompaniesList(el){
				     $(el).closest('.row').next().slideUp("300");
             $('#insuranceCompanyName').css('border-color', '#f2f2f2');
			}
    </script>
@endsection