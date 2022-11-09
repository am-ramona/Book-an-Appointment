@extends('layouts.backend')

@section('content')
<div id="page" class="content clearfix">
	<div id="dashboardHeader" class="col-sm-12">
								<div class="col-xs-12 col-sm-4">
									<div id="todaysAppointment">
											<p class="headerTitle">Today's Appointment</p>
											<p class="headerNumber">13</p>
									</div>
			</div>
								<div class="col-xs-12 col-sm-4">
									<div id="totalPatients">
											<p class="headerTitle">Total Patients</p>
											<p class="headerNumber">102</p>
									</div>
			</div>
								<div class="col-xs-12 col-sm-4">
										<div id="totalIncome">
											<p class="headerTitle">Total income</p>
											<p class="headerNumber">102</p>				
					      </div>
			</div>	
			</div>
		
	<section id="CurrentUpcomingAppointments" class="col-sm-12">
			<aside class="col-xs-12 col-sm-8">
				<div id="CurrentAppointments">
        <div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Current Appointment</span>
					</div>
				<div class="panel-body">
					<div class="IdTypeListing">
						<ul class="IdListing">
						<li>ID :</li>
						<li>#501</li>
						</ul>
							<ul class="TypeListing">
						<li>Type :</li>
						<li>REGULAR CHECK UP</li>
						</ul>
					</div>
						 </div>
			  <div class="panel-footer">
					<div class="PatientAbstract">
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
			</aside>
			<aside class="col-xs-12 col-sm-4">
			<div id="UpcomingAppointments">
			 <div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Upcoming Appointments</span>
					</div>
				<div class="panel-body">
					<div class="UpcomingAppointmentsListing">
						<div class="PatientListing clearfix">
							<ul>
						<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
						<li>View Profile</li>		
						</ul>
										<ul>
							<li class="PatientId">#3204</li>
							<li class="PatientName">Adonis Abou Zaki</li>
							<li class="PatientAgeGender">45 years , Male</li>
							<li class="PatientBloodType">Blood Type: O-</li>
						</ul>					
					</div>
							<div class="PatientListing clearfix">
							<ul>
						<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
						<li>View Profile</li>		
						</ul>
						<ul>
							<li class="PatientId">#3204</li>
							<li class="PatientName">Adonis Abou Zaki</li>
							<li class="PatientAgeGender">45 years , Male</li>
							<li class="PatientBloodType">Blood Type: O-</li>
						</ul>					
					</div>
							<div class="PatientListing clearfix">
							<ul>
					      <li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
					    	<li>View Profile</li>		
					  	</ul>
							<ul>
						  	<li class="PatientId">#3204</li>
						  	<li class="PatientName">Adonis Abou Zaki</li>
						  	<li class="PatientAgeGender">45 years , Male</li>
						  	<li class="PatientBloodType">Blood Type: O-</li>
						  </ul>					
					</div>
							<div class="PatientListing clearfix">
						   <ul>
					     	<li><i id="PatientPhoto" class="fa fa-user-circle" aria-hidden="true"></i></li>
						    <li>View Profile</li>		
							</ul>
							<ul>
								<li class="PatientId">#3204</li>
								<li class="PatientName">Adonis Abou Zaki</li>
								<li class="PatientAgeGender">45 years , Male</li>
								<li class="PatientBloodType">Blood Type: O-</li>
							</ul>					
					</div>
 					</div> 
						 </div>
				</div>
				</div>
			</aside>
		</section>
		
	<section id="AddPatientForm" class="col-sm-12">
        <div  id="AddPatientPanel" class="panel">
          <div class="panel-heading">
            <div class="panel-title">Add Patient</div>
          </div>
          <div class="panel-body">
            <form action="">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="firstName">First name:</label>
									<div class="col-sm-10">
                  <input type="text" id="firstName" class="form-control">
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="lastName">Last name:</label>
										<div class="col-sm-10">
                  <input type="text" id="lastName" class="form-control">
									</div>
                </div>
              </div>
							 <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="BirthDate">Date of Birth:</label>
									<div class="col-sm-10">
										 <div class="input-group date" data-provide="datepicker">
												<input type="text" class="form-control" placeholder="Please choose Date">
												<div class="input-group-addon">
														<span class="glyphicon glyphicon-th"></span>
												</div>
										</div>
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2">Gender:</label>
										<div class="col-sm-5 genderOption">
                   <input type="radio" name="gender" value="male" checked> Male<br>
									</div>
									<div class="col-sm-5 genderOption">
                   <input type="radio" name="gender" value="female"> Female<br>
									</div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="email">E-mail:</label>
										<div class="col-sm-10">
                         <input type="text" id="email" class="form-control">
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="phoneNo">Phone No:</label>
									<div class="col-sm-10">
                  <input type="text" id="phoneNo" class="form-control">
									</div>
                </div>
              </div>
						  <div class="row">
                <div class="col-sm-12 form-group">
                  <label class="control-label" for="address">Address:</label>
<!-- 									<div class="col-sm-10"> -->
                  <input type="text" id="address" class="form-control">
<!-- 									</div> -->
                </div>
              </div>
							<div class="row text-right AddPatientFormFooter">
						<button id="cancel" type="button" class="btn btn-default">Cancel</button>
						<button id="add" type="submit" class="btn btn-primary">Add</button>						
					</div>
            </form>
      </div>		
	</div>
		</section>
		
	<section id="AddAppointmentForm" class="col-sm-12">
        <div  id="AddAppointmentPanel" class="panel">
          <div class="panel-heading">
            <div class="panel-title">Add Appointment</div>
          </div>
          <div class="panel-body">
            <form action="">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="appointmentType">Appointment Type:</label>
									<div class="col-sm-10">
                  <input type="text" id="appointmentType" class="form-control">
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="patientName">Patient:</label>
										<div class="col-sm-10">
                  <input type="text" id="patientName" class="form-control" placeholder="Please choose/ add a Patient">
									</div>
                </div>
              </div>
						  <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="DateTime">Date & Time:</label>
							
									<div class="col-sm-10">
                 										          <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" id="DateTime" placeholder="Please choose Date & Time">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
									</div>
                </div>
              </div>
							</div>
							<div class="row text-right AddAppointmentFormFooter">
						<button id="cancel" type="button" class="btn btn-default">Cancel</button>
						<button id="add" type="submit" class="btn btn-primary">Add</button>						
					</div>
            </form>
      </div>		
	</div>
		</section>
		
	<section id="AddPaymentForm" class="col-sm-12">
        <div  id="AddPaymentPanel" class="panel">
          <div class="panel-heading">
            <div class="panel-title">Add Payment</div>
          </div>
          <div class="panel-body">
            <form action="">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="appointment">Appointment:</label>
									<div class="col-sm-10">
                  <input type="text" id="appointment" class="form-control" placeholder="Please choose an Appointment">
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="paymentOfPatient">Patient:</label>
										<div class="col-sm-10">
                  <input type="text" id="paymentOfPatient" class="form-control" placeholder="Please choose/ add a Patient">
									</div>
                </div>
              </div>
							 <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="PaymentMethod">Payment Method:</label>
									<div class="col-sm-10">
                  <input type="text" id="PaymentMethod" class="form-control" placeholder="Please choose the payment Method">
									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="PaymentStatus">Payment Status:</label>
									<div class="col-sm-10">
                  <input type="text" id="PaymentStatus" class="form-control" placeholder="Please choose the payment Status">
									</div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="charge">Charge:</label>
										<div class="col-sm-10">
                                <input type="text" id="charge" class="form-control">

									</div>
                </div>
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2">Discount</label>
									<div class="col-sm-2 discountOption">
                   <input type="radio" name="gender" value="male" checked>0%<br>
									</div>
									<div class="col-sm-2 discountOption">
                   <input type="radio" name="gender" value="female">20%<br>
									</div>
										<div class="col-sm-2 discountOption">
                   <input type="radio" name="gender" value="female">30%<br>
									</div>
										<div class="col-sm-2 discountOption">
                   <input type="radio" name="gender" value="female">40%<br>
									</div>
                </div>
              </div>
						  <div class="row">
                <div class="col-sm-6 form-group">
                  <label class="control-label col-sm-2" for="PaymentDate">Payment Date:</label>
									<div class="col-sm-10">
                 										          <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" id="PaymentDate" placeholder="Please choose Date">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
									</div>
                </div>
              </div>
							</div>
							<div class="row text-right AddPaymentFormFooter">
						<button id="cancel" type="button" class="btn btn-default">Cancel</button>
						<button id="add" type="submit" class="btn btn-primary">Add</button>						
					</div>
            </form>
      </div>		
	</div>
		</section>

</div>

@endsection


@section('script')




@endsection