@extends('layouts.exeption_template.homewithoutslider')

@section('content')
<!-- Content Start -->

	    <div class="pageWrapper ">
			<!-- Content Start -->
	
				
				<div class="sectionWrapper">
					
					<div class="container">
						<h3 class="font-alt">Signup</h3><hr><br>
										<!-- site preloader start -->
										<div class="col-sm-12">
											@if (Session::has('message'))
												<div class="alert alert-success">
													<p>{{ Session::get('message') }}</p>
												</div>
											@endif

											@if ($errors->any())
												<div class="alert alert-danger">
													<ul>
														{!! implode('', $errors->all('
														<li class="error">:message</li>
														')) !!}
													</ul>
												</div>
											@endif
										</div>
						<!-- site preloader end -->


						{!! Form::open(['route' => 'register.store','id'=>'form']) !!}
						<div class="row">
							<div class="cell-7 contact-form fx animated fadeInLeft" data-animate="fadeInLeft">
								<div class="cell-12 contact-form fx " data-animate="fadeInLeft">
								
			
									<h1>{{ trans('quickadmin::admin.users-create-create_user'), ['class' => 'btn btn-large main-bg'] }}</h1>
										<div class="block-head"><div class="form-input">
											{!! Form::label('name', trans('quickadmin::admin.users-create-name')) !!}
											{!! Form::text('name', old('name'), ['placeholder'=> trans('quickadmin::admin.users-create-name_placeholder')]) !!}
										</div>
										<div class="form-input">
											{!! Form::label('email', trans('quickadmin::admin.users-create-email')) !!}
											{!! Form::email('email', old('email'), ['id' => 'email','placeholder'=> trans('quickadmin::admin.users-create-email_placeholder')]) !!}
										</div>
										<div class="form-input">
											{!! Form::label('Confirm email', trans('quickadmin::admin.users-create-emailconfirm')) !!}
											{!! Form::email('confirmemail', old('email'), ['id' => 'confirm_email','placeholder'=> trans('quickadmin::admin.users-create-emailconfirm_placeholder')]) !!}
											<span id="messageEmail"></span>
										</div>
										<div class="form-input">
											{!! Form::label('password', trans('quickadmin::admin.users-create-password')) !!}
											{!! Form::password('password', ['id' => 'password','placeholder'=> trans('quickadmin::admin.users-create-password_placeholder')]) !!}
										</div>
										<div class="form-input">
											{!! Form::label('Confirm password', trans('quickadmin::admin.users-create-passwordconfirm')) !!}
											{!! Form::password('confirmpassword', ['id' => 'confirm_password','placeholder'=> trans('quickadmin::admin.users-create-passwordconfirm_placeholder')]) !!}
											<span id="messagePassword"></span>
										</div></div>
										<div class="block-head"><div class="form-input">
											{!! Form::label('Birthday',  trans('quickadmin::admin.users-create-birthday')) !!}
											{!! Form::date('birthday', \Carbon\Carbon::now()) !!}
										</div>
										<div class="form-input">
											{!! Form::select('gender',[
												'Male',
												'Female',
												'not specify',
											]) !!}
										</div>
										<div class="form-input">
											{!! Form::select('country', $countries)!!}
										</div>
										<div class="form-input">
											{!! Form::label('Phone',  trans('quickadmin::admin.users-create-phone_placeholder')) !!}
											{!! Form::text('phone', old('phone'),['placeholder'=>trans('quickadmin::admin.users-create-phone_placeholder')]) !!}

										</div></div>
										<div class="form-input">
											{!! Form::select('type_user',[
												'Administrator Clinic',
												'Patient'
											], null, array('onchange' => '_type()', 'id' => 'type_user')) !!}
										</div>
											
										<div id="group_med">
											{{ Form::checkbox('typepro',null,null, array('id'=>'typepro')) }}
										    <label style="font-weight: normal;">I am doctor</label>
										</div>

										<div class="form-input">
											<input id="termofuse" name="checktermofuse" type="checkbox" onclick="change_button(this,'submit')"> I have read and accept the <a href="{{ url('/terms') }}">terms of use!</a>
										</div>
										<div class="alert alert-danger" style="display:none" id="alertcaptcha">
												please check Captcha
										</div>
										<div class="g-recaptcha" data-sitekey="6LdvgTYaAAAAAI3Ljp4va734XlQZjg7x-2eZpyen"></div>
											

										<div class="form-group">
											<div class="col-sm-10 col-sm-offset-2">
												{!! Form::submit(trans('quickadmin::admin.users-create-btncreate'), ['id' => 'submit', 'class' => 'btn btn-large main-bg','disabled']) !!}
												{!! link_to_route('register.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-large')) !!}
											</div>
										</div>
										<input type="hidden" name="remember_token" value="{{Session::token()}}">
										<input type="hidden" name="role_id" value="2">

						{!! Form::close() !!}	
					</div>
			    </div>
			    			
				    		<div class="cell-5 fx padd-top-35" data-animate="fadeInRight">
				    			<div class="notices">
									<div class="box warning-box fx" data-animate="fadeInRight">
										<h3>You need to know:</h3>
										<p>Patient pre-registration is a key strategy for improving the onboarding and intake process, which can often get bogged down with complicated data collection and administrative tasks. By collecting patient intake materials ahead of the appointment, pre-registration helps organizations create a higher quality consumer experience and increased patient satisfaction.</p>
The patient registration process is instrumental for giving a good first impression of a healthcare organization. A positive patient experience that starts at the check-in desk can set the tone for the entire care encounter.</p>
Is the office organized? Are administrative staff friendly and knowledgeable? Are patient-facing instructions clear? These aspects of the onboarding process make an immediate impression on patients, who prefer short wait times and simple tasks that do not require multiple steps or complicated paperwork..</p>
									</div>
								</div>
				    			<ul id="accordion" class="accordion">
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">Can i change my profile ?</span></a></h3>
										<div class="accordion-panel active">
											You can choose a photo to set as your DoctorSina profile picture. This image appears in your medical records or during discussions with your doctors or when someone visits your profile.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">How Can i register in the site ?</span></a></h3>
										<div class="accordion-panel">
										You don't have a DoctorSina account yet?</p>
											Create an online account to register multiple participants, including yourself, through the registration portal. https://www.doctorsina.net/register</p>
											1. First of all, create your own personal account. Click on the "Create" button.</p>
											2. Log in to DoctorSina and complete your profile using your information.</p>
											3. Once your profile is complete, log into the portal.</p>
											4. If you are an administrator:</p>
											4. Select the "Add Doctor" button to add the actual name of the Doctors before selecting your registration type either Clinic or goverment. You can register and you can act as an administrator to register others.</p>
											5. Complete the “Add Medical Facility” dialog box that appears.</p>
											5. Select the appropriate service (s) needed and proceed to checkout. You can pay by credit card, cryptocurrency, or you can select pay by check to pay later..</p>										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">How can i change my details ?</span></a></h3>
										<div class="accordion-panel">
											Here's how to view and update personal information, such as mailing address, email address, phone number, or language:</p>

											1. log into doctorSina.</p>
											2.Click on profile at the top right.</p>
											3.your profile is displayed.</p>
											4. Edit the information you want such as your address, email address and phone number, start by clicking on the + sign to add or edit your information. You can select your language from the language drop-down list on the left side of the page.</p>

											Here's how to view and update your financial information, such as bank accounts, debit and credit cards, or currencies:</p>

											1.Click on Wallet at the top of the page.</p>
											2.Click on Remove Bank or Update Card / 3.Delete Card in the middle of the page and follow the steps provided.</p>

											Here's how to update your password, security questions, mobile PIN, or security key:</p>
											1.Click on the Settings cog next to sign out.</p>
											2.Click on the Security tab.</p>
											3. Click Update in a specific section and follow the steps provided.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">What is DoctorSina© policy ?</span></a></h3>
										<div class="accordion-panel">
										to consult our DoctorSina © privacy policy. Thank you for visiting our page <a href="{{ url('/privacy') }}">Privacy policy</a>.
										</div>
									</li>
									<li>
										<h3 class="skew-25"><a href="#"><span class="skew25">What are the paymeny methods can i use ?</span></a></h3>
										<div class="accordion-panel">
											What payment methods can I use?
											When setting up an online store, knowing the types of payment methods to use is essential for your business. Not only because there are different types of choices, but some types are optimized to maximize income opportunities. Here's a short checklist to help you determine what types of payment methods will work best for your ecommerce business.</p>
											</p>
											Types of payment methods</p>
											1. Credit Cards: As a comprehensive payment solution, credit cards are the most common medium for DoctorSina customers.</p>
											</p>
											2. Mobile payments: Mobile payments offer a quick solution to DoctorSina customers.</p>
											</p>
											3. Bank Transfers: Customers registered with an online bank can make a bank transfer securely, as each transaction must first be authenticated and approved by bank credentials.</p>
											</p>
											4. Electronic Wallets: An electronic wallet stores a client's personal data and funds, which are then used to purchase online from DoctorSina. Signing up for an e-wallet is quick and easy, with customers simply having to submit their information once for purchases. In addition, electronic wallets can also work in combination with mobile wallets through the use of smart technologies such as NFC (Near Field Communication) devices. By tapping on an NFC terminal, mobile phones can instantly transfer funds stored in the phone.</p>
											</p>
											5. Prepaid Cards: An alternative payment method, commonly used by minors or customers without a bank account. Prepaid cards will be available in different stored values ​​from which customers can choose.</p>
											</p>
											There are different types of payment methods for DoctorSina services. If you need help send us an email to contact@doctorsina.net
										</div>
									</li>
								</ul>
			    			</div>
		    			
						</div>
					</div>
				</div>
				
			</div>
			<!-- Content End -->
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    	
	    </div>

<!-- Content End -->


@section('javascript')
<link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<script>
 function jsfunction(){
                alert("hi");
            }

        $(document).ready(function () {
			$.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

			console.log("hh")
			$('#ty').change(function () {
				console.log("test");
				alert("hi")
				$('#med')
                  .empty()
			})  
		})

</script>
@endsection

@stop

