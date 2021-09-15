@extends('layouts.register')

@section('content')
    <!-- Start Page Title Area -->
		<div class="page-title-area">
			<div class="container">
				<div class="page-title-content">
					<h2>Get your job offer in front of qualified candidates</h2>
					<ul>
						<li>
							<a href="{{url('/home')}}">
								Home 
							</a>
						</li>
						<li class="active">Register</li>
					</ul>
				</div>
			</div>
		</div>
        <!-- End Page Title Area -->
        
        <div class="row mt-4">
            <div class="col-sm-6 offset-sm-3 d-flex p-2">
                <button style="height:300px; background-color:#F78154;  margin-right:20px; font-size:40px; font-weight:900; color:white" onclick="showApplicantForm()" class="btn w-50">Job Seekers</button>
                <button style="height:300px; background-color:#336161 ;  font-size:40px; font-weight:900; color:white" onclick="showCompanyForm()" class="btn w-50"  >Employers</button>
            </div>
        </div>
        @isset($message)
		<div>
			<div id="alertMessage" class="alert alert-danger" role="alert" onclick="closeAlert(this.id)">
				{{$message}}
			  </div>
		</div>
        @endisset
        
        <!-- Start User Area -->
		<section class="user-area pb-100 pt-70">
			<div class="container">
				@error('email')<div>
					<div  class="alert alert-danger" role="alert">
						{{$message}}
					  </div>
				</div>
				@enderror
				<div hidden id="applicant-form" class="row">
					<div class="col-lg-6" style="margin: auto;">
						<div class="user-form-content">
							<h3 style="color: #ffffff;">Create an Account as an applicant</h3>
							

							<form class="user-form" action="{{url(env('APP_URL').'applicant/register')}}" method="post" enctype="multipart/form-data">
								<div class="row">
									@csrf
									<div class="col-6">
										<div class="form-group">
											<label>Full Name</label>
											<input required class="form-control" type="text" name="full_name">
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label>Email</label>
											<input required class="form-control" type="email" name="email">
										</div>
										@error('email')
										<span>{{ $message }}</span>
									@enderror
									</div>

									
									
									{{-- &nbsp; --}}
									<div class="col-6">
										<div class="form-group">
											<label>Password <span hidden id="passwordMessage" style="color:red"> Password must contains at least one number, one lowercase, one uppercase letter, and six characters</span></label>
											<input required  onblur="check_Password(this.value)" id="applicantPassword" class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Confirm Password </label>
											<input required onblur="passwords(this.id,'applicantPassword','alertApplicantPassword')" id="applicantConfirmPassword" class="form-control" type="password" name="confirm-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>

										<div>
											<div  hidden id="alertApplicantPassword" class="alert alert-danger" role="alert">
												Password mismatch
											  </div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Username</label>
											<input required class="form-control" type="text" name="username">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>title</label>
											<input required class="form-control" type="text" name="title">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Expertise</label>
											<br>
											<select required name="expertise_id">
												<option value="">Choose an expertise</option>
												@foreach ($data as $expertise)
												<option value={{$expertise->id}}>{{$expertise->expertise_name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label>Years Of Experience</label>
											<input  style="" required class="form-control" type="number" name="years_of_experience">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Location</label>
											<input required class="form-control" type="text" name="location">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>phone</label>
											<input required class="form-control" type="text" name="phone" placeholder="ex: +(XXX) XXX XXXX">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Resume in PDF</label>
											<input required class="form-control" type="file" name="resume_pdf" >
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Photo</label>
											<input required class="form-control" type="file" name="photo" >
										</div>
									</div>
									
								
									<div class="col-12">
										<div class="form-group">
											<label>Description</label>
											<input required class="form-control" type="textarea" name="description" style="height:150px;">
										</div>
									</div>
									<div class="col-12">
										<button class="default-btn register" type="submit">
											Register Now
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

		
				<div hidden id="company-form" class="row">
					<div class="col-lg-6" style="margin: auto;">
						<div class="user-form-content">
							<h3 style="color: #ffffff;">Create an Account as a Company</h3>
							

							<form class="user-form" action="{{url(env('APP_URL').'company/register')}}" method="post">
								<div class="row">
									@csrf
									<div class="col-6">
										<div class="form-group">
											<label>Name</label>
											<input required class="form-control" type="text" name="name">
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label>Email</label>
											<input required class="form-control" type="email" name="email">
										</div>
										@error('email')
										<span>{{ $message }}</span>
									@enderror
									</div>

									
									
									{{-- &nbsp; --}}
									<div class="col-6">
										<div class="form-group">
											<label>Password <span hidden id="passwordMessage_2" style="color:red"> Password must contains at least one number, one lowercase, one uppercase letter, and six characters</span></label>
											<input required onblur="check_Password(this.value)"  id='companyPassword' class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Confirm Password </label>
											<input required  onblur="passwords(this.id,'companyPassword','alertCompanyPassword')" id="companyConfirmPassword" class="form-control" type="password" name="confirm-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
										</div>
										<div>
											<div  hidden id="alertCompanyPassword" class="alert alert-danger" role="alert">
												Password mismatch
											  </div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Username</label>
											<input required class="form-control" type="text" name="username">
										</div>
									</div>
								
									<div class="col-6">
										<div class="form-group">
											<label>Expertise</label>
											<br>
											<select required name="expertise_id">
												<option value="">Choose an expertise</option>
												@foreach ($data as $expertise)
												<option value={{$expertise->id}}>{{$expertise->expertise_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Location</label>
											<input required class="form-control" type="text" name="location">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Website</label>
											<input required class="form-control" type="text" name="website">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Phone</label>
											<input required class="form-control" type="text" name="phone" placeholder="ex: +(xxx) xxx xxx">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label>Introduction</label>
											<input required class="form-control" type="text" name="introduction">
										</div>
									</div>
			
									<div class="col-12">
										<div class="form-group">
											<label>Description</label>
											<input required class="form-control" type="textarea" name="description" style="height:150px;">
										</div>
									</div>
									
									<div class="col-12">
										<button class="default-btn register" type="submit">
											Register Now
										</button>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

		
			</div>
		</section>
		<!-- End User Area -->

		<script type="text/javascript">
	 	var passwordValidator = true
		function check_Password(str)
			{
				console.log(str)
			  // at least one number, one lowercase and one uppercase letter
			  // at least six characters
			  var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
			  
			  var passwordValidator = re.test(str)
			  if(!passwordValidator){
				document.getElementById('passwordMessage').hidden = false
				document.getElementById('passwordMessage_2').hidden = false
			  }else{
				document.getElementById('passwordMessage').hidden = true
				document.getElementById('passwordMessage_2').hidden = true
			  }
			}
		  
		  </script>
@endsection