@extends('layouts.login')

@section('content')
    <!-- Start Page Title Area -->
		<div class="page-title-area">
			<div class="container">
				<div class="page-title-content">
					<h2>LOGIN</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li>
						<li class="active">Login</li>
					</ul>
				</div>
			</div>
		</div>
        <!-- End Page Title Area -->
        
		<div class="row mt-4">
            <div class="col-sm-6 offset-sm-3 d-flex p-2">
                <button onclick="showApplicantForm()" class="btn btn-primary w-50">I am an Applicant</button>
                <button onclick="showCompanyForm()" class="btn btn-success w-50"  >I am a Company</button>
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
				<div class="row">
					<div class="col-lg-6" style="margin: auto;">
						<div hidden id="applicant-form" class="user-form-content log-in-50">
							<h3 style="color: #ffffff;">Log In as Applicant</h3>
						
							<form  class="user-form" action="{{url(env('APP_URL').'applicant/login')}}" method="post">
								<div class="row">
                                    @csrf
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="email">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Log In
										</button>
									</div>
								</div>
							</form>
						</div>

						<div hidden id="company-form" class="user-form-content log-in-50">
							<h3 style="color: #ffffff;">Log In as Company</h3>
						
							<form  class="user-form" action="{{url(env('APP_URL').'company/login')}}" method="post">
								<div class="row">
                                    @csrf
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="email">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Log In
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
@endsection