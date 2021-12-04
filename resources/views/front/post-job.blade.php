@extends('layouts.site')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Company</h2>
            <ul>
                <li>
                    <a href={{route('home')}}>
                        Home
                    </a>
                </li>
                <li class="active">Company Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Candidates Profile Area -->
<section class="candidates-profile-area ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="avatar-sidebar">
					{{-- <h3>Profile</h3>

					<div class="avatar-img">
						<img src="../assets/images/avatar-img.jpg" alt="Image">

						<div class="avatar-mane">
							<h4>Randall Guerrero</h4>
							<span>UX/UI Designer</span>
						</div>
					</div> --}}

					<ul>
						<li>
							<a href="{{url('/company-profile')}}">Profile</a>
						</li>
						<li>
							<a class="active">Post a Job</a>
						</li>
						<li>
							<a href="pricing.html">Subscription</a>
						</li>
						<li>
							<a href="change-password.html">Change Password</a>
						</li>
						<li>
							<a href="{{url('/logout')}}">Log Out</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="candidates-profile-content">
					<form class="profile-info" action="{{url(env('APP_URL').'company-post-job')}}" method="post">
						<h3>Job Description</h3>

						<div class="row">
                            @csrf
                            <div hidden class="col-lg-12 col-md-12">
								<div hidden class="col-lg-12">
									<div hidden class="form-group">
										<label>Company ID*</label>
                                    <input value="{{auth()->guard('company')->id()}}" required class="form-control" type="text" name="company_id">
									</div>
								</div>
                            </div>


							<div class="col-lg-12 col-md-12">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Job title*</label>
										<input required class="form-control" type="text" name="job_title">
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Category*</label>
											<select required name="expertise_id">
                                                <option value="">Choose a category</option>

                                                @foreach ($categories as $category)

                                                <option value="{{$category->id}}">{{$category->expertise_name}}</option>

                                                @endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label>Job Types*</label>
									<select required name="job_type">
										<option value="Full Time">Full Time</option>
										<option value="Part Time">Part Time</option>
										<option value="Contract">Contract</option>
										<option value="Internship">Internship</option>
										<option value="Office">Office</option>
									</select>
								</div>
                            </div>

                            <div class="col-lg-12 col-md-12">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Years of Experience*</label>
										<input required class="form-control" type="number" name="years_of_experience">
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label>Application Deadline</label>
									<div class="input-group date" id="datetimepicker">
										<input required type="text" class="form-control" placeholder="12/11/2021" name="time_frame">
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label>Salary Currency</label>
									<select required name="salary">
										<option value="default">Default</option>
										<option value="20000 To 30000">20000 To 30000</option>
										<option value="40000 To 50000">40000 To 50000</option>
										<option value="60000 To 70000">60000 To 70000</option>
										<option value="80000 To 90000">80000 To 90000</option>
									</select>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="form-group">
									<label>Job Description*</label>
									<textarea required name="job_description" class="form-control" rows="6"></textarea>
								</div>
                            </div>

                            <div class="col-lg-12">
								<div class="form-group">
									<label>Job Question*</label>
									<textarea required name="question" class="form-control" rows="6"></textarea>
								</div>
                            </div>

                            <div class="col-lg-12 col-md-12">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Date Posted*</label>
										<input requiured class="form-control" type="date" name="date_posted" placeholder="yyyy-mm-dd" value=""
										min="1997-01-01" max="2030-12-31">
									</div>
								</div>
							</div>

							<div class="col-lg-12">
								<button type="submit" class="default-btn">
									Post a Job
								</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</section>
<!-- End Candidates Profile Area -->

@endsection
