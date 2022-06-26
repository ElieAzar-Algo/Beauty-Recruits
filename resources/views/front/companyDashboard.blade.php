@extends('layouts.site')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Employer</h2>
                <ul>
                    <li>
                        <a href={{route('home')}}>
                            Home
                        </a>
                    </li>
                    <li class="active">Employer Dashboard</li>
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
                    <div class="avatar-sidebar" style="margin-bottom:100px">
                        <h3>Profile</h3>

                        <div class="avatar-img">
                            {{--                        <img src="../assets/images/avatar-img.jpg" alt="Image">--}}

                            <div class="avatar-mane">
                                <h4>{{$company ->username}}</h4>
                                <span>{{$company ->field_expertise->expertise_name}}</span>
                            </div>
                        </div>

                        <ul>

                            <li>
                                <a href="{{url('/company-profile')}}">Profile</a>
                            </li>

                            <li>
                                <a class="active" href="{{url('company-dashboard')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{url('/company-post-job')}}">Post a Job</a>

                            </li>
                            <li>
                                <a href="{{url('company-subscription')}}">Subscription</a>
                            </li>
                            <li>
                                <a href='/company-change-password?token={{auth()->user()->token}}'>Change Password</a>
                            </li>
                            <li>
                                <a href="{{url('/logout')}}">Log Out</a>
                            </li>
                        </ul>
                    </div>

                    <div class="candidates-profile-content">
                        <h3>My Jobs</h3>
                        @foreach ($myJobs as $item)
                            <div class="hot-jobs-list">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="hot-jobs-content">
                                            <h3><a>{{$item->job_title}}</a></h3>

                                            <ul>
                                                <li><span>Job Type:</span> {{$item->job_type}}</li>
                                                <li><span>Experience: </span>{{$item->years_of_experience}}</li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="hot-my-jobs-btn" style="width:10px;height:10px">
                                            <a href="{{url('job-details/')}}/{{$item->id}}"
                                               style="width:10px;height:10px" class="default-btn">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="candidates-dashboard-content">
                        <div class="candidates-dashboard">
                            <h3>Dashboard</h3>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single-work-view">
                                        <span>{{$remaining_cv}}</span>
                                        <h3>Remaining CV</h3>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="single-work-view">
                                        <span>{{$applicantsNumber}}</span>
                                        <h3>Applicants</h3>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="single-work-view">
                                        <span>{{$job_posted}}</span>
                                        <h3>Job Posted</h3>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="single-work-view" style="background-color: red;">
                                        <span>{{$days_to_recharge}}</span>
                                        <h3 style="color: #ffffff;">Days to recharge</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-activities">
                                <h3>Recent Activities</h3>

                                <ul class="activities">
                                    @foreach($applicants as $applicant )
                                        <li>
                                            {{$applicant->applicant->full_name}} Just Applied in {{$applicant->job->job_title}}!
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Candidates Profile Area -->

@endsection
