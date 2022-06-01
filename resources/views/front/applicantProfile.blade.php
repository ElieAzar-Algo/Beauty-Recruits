@extends('layouts.site')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Candidate</h2>
            <ul>
                <li>
                    <a href={{route('home')}}>
                        Home
                    </a>
                </li>
                <li class="active">Candidate Profile</li>

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
                    <h3 style="color: #ffffff;">Profile</h3>

                    <div class="avatar-img">
{{--                        <img src="{{'https://beauty-recruits.com/public/storage/'.$applicant->photo}}" alt="Image">--}}

                        <div class="avatar-mane">
                        <h4>{{$applicant->full_name}}</h4>
                            <span>{{$applicant->field_expertise->expertise_name}}</span>
                        </div>
                    </div>

                    <ul>
                        <li>
                            <a href="" class="active">Profile</a>
                        </li>
                        <li>
                            <a href="/applicant-dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a href="/job-history">Job History</a>
                        </li>
                        <li>
                            <a href="/change-password?token={{auth()->user()->token}}">Change Password</a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="candidates-resume-content">
                    <form class="resume-info" action="{{url(env('APP_URL').'applicant-update')}}" method="POST" enctype="multipart/form-data">
                        <h3>Personal Details</h3>
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input  value="{{ old( 'full_name', $applicant->full_name) }}"   class="form-control" type="text" name="full_name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input value="{{ old( 'username', $applicant->username) }}"  class="form-control" type="text" name="username">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  value="{{ old( 'email', $applicant->email) }}"  class="form-control" type="email" name="email">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input  value="{{ old( 'phone', $applicant->phone) }}"  class="form-control" type="text" name="phone">
                                </div>
                            </div>

                            {{-- <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Date Of Barth</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="text" class="form-control" placeholder="12/11/2021">
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="height">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Marital status</label>
                                    <select class="height">
                                        <option value="1">Married</option>
                                        <option value="2">Unmarried</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <select>
                                        <option value="1">United Kingdom</option>
                                        <option value="2">Austria</option>
                                        <option value="3">Bahrain</option>
                                        <option value="4">Canada</option>
                                        <option value="5">Denmark</option>
                                        <option value="6">Germany</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address Details</label>
                                    <textarea name="message" class="form-control" rows="4"></textarea>
                                </div>
                            </div> --}}
                        </div>

                        <h3>Career And Application Information</h3>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Objective</label>
                                    <textarea name="description"
                                              class="form-control" rows="4"
                                              value="{{ old( 'description', $applicant->description) }}"
                                    >
                                        {{$applicant->description}}
                                    </textarea>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Experience in (Years)</label>
                                    <input  value="{{ old( 'years_of_experience', $applicant->years_of_experience) }}"   class="form-control" type="text" name="years_of_experience">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Update Resume in PDF   <a href="{{url('/storage/'.$applicant->resume_pdf)}}" style="color: #0bd2ff">(View Resume)</a>
                                    </label>
                                    <input required class="form-control" type="file" name="resume_pdf"
                                           accept="application/pdf" >
                                </div>
                            </div>
                            {{--
                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="form-group">
                                                              <label>Company Business </label>
                                                              <input class="form-control" type="text" name="Business">
                                                          </div>
                                                      </div>

                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="form-group">
                                                              <label>Designation</label>
                                                              <input class="form-control" type="text" name="Designation">
                                                          </div>
                                                      </div>

                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="form-group">
                                                              <label>Department</label>
                                                              <input class="form-control" type="text" name="Department">
                                                          </div>
                                                      </div>

                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="form-group">
                                                              <label>Responsibilities</label>
                                                              <input class="form-control" type="text" name="Responsibilities">
                                                          </div>
                                                      </div>

                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="form-group">
                                                              <label>Company Location</label>
                                                              <input class="form-control" type="text" name="Location">
                                                          </div>
                                                      </div>

                                                      <div class="col-lg-6">
                                                          <div class="form-group">
                                                              <label>Employment Period</label>
                                                              <select>
                                                                  <option value="1">2021</option>
                                                                  <option value="2">2021</option>
                                                                  <option value="3">2022</option>
                                                                  <option value="4">2023</option>
                                                                  <option value="5">2024</option>
                                                                  <option value="6">2025</option>
                                                              </select>
                                                          </div>
                                                      </div> --}}

                            <div class="col-lg-12">
                                <input type="submit" class="default-btn" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Candidates Resume Area -->

@endsection
