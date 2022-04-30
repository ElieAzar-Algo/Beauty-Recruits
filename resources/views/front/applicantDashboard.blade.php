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
                    <li class="active">Candidate Dashboard</li>

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
                                <a href="/applicant-profile">Profile</a>
                            </li>
                            <li>
                                <a href="" class="active">Dashboard</a>
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

                    <div class="candidates-dashboard-content">
                        <div class="candidates-dashboard">
                            <h3>Dashboard</h3>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single-work-view">
                                        <span>{{$applicantsNumber}}</span>
                                        <h3>Total Applications</h3>
                                    </div>
                                </div>

                                {{--                                <div class="col-lg-4">--}}
                                {{--                                    <div class="single-work-view">--}}
                                {{--                                        <span>362</span>--}}
                                {{--                                        <h3>Total Applications</h3>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="col-lg-4">--}}
                                {{--                                    <div class="single-work-view">--}}
                                {{--                                        <span>43</span>--}}
                                {{--                                        <h3>Total Applications</h3>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="recent-activities">
                                <h3>Recent Activities</h3>
                                <ul class="activities">
                                    @foreach($applicants as $appl)
                                        <li>
                                            You applied to {{$appl->job->job_title}}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>
    <!-- End Candidates Resume Area -->

@endsection
