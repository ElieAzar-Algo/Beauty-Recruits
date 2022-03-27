@extends('layouts.site')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Post a job listing now and fill your vacancy faster!</h2>
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
                        <ul>
                            <li>
                                <a href="{{url('/company-profile')}}">Profile</a>
                            </li>
                            <li>
                                <a href="{{url('/company-post-job')}}">Post a Job</a>
                            </li>
                            <li>
                                <a class="active">Subscription</a>
                            </li>
                            <li>
                                <a href='/company-change-password?token={{auth()->user()->token}}'>Change Password</a>
                            </li>
                            <li>
                                <a href="{{url('/logout')}}">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="candidates-profile-content">
                        <div class="candidates-dashboard">
                            <h3>Subscription</h3>

                            <div class="row">
                                @foreach($data as $subscription)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-pricing-box">
                                            <div class="pricing-title">
                                                <h1>{{$subscription->title}}</h1>
                                                <h4>{{$subscription->price?'$'.$subscription->price :'Free'}}</h4>
                                            </div>

                                            <ul>
                                                @foreach($subscription->description as $description )
                                                    <li>
                                                        <i class="bx bx-check"></i>
                                                        {{$description['title']}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <a href="log-in.html" class="default-btn">
                                                Get Started
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Candidates Profile Area -->

@endsection
