@extends('layouts.site')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Company Details</h2>
            <ul>
                <li>
                    <a href={{route('home')}}>
                        Home
                    </a>
                </li>
                <li class="active">Company Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Employers Details Area -->
<section class="employers-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hot-jobs-list">
                    <div class="row align-items-center">
{{--                        <div class="col-lg-2">--}}
{{--                            <div class="hot-jobs-img">--}}
{{--                                <img src="assets/images/hot-jobs/hot-jobs-1.png" alt="Image">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-lg-10">
                            <div class="hot-jobs-content">
                            <h3>{{$company->name}}</h3>
                            <span class="sub-title">{{$company->field_expertise->expertise_name}}</span>
                                <ul>
                                <li><span>Vacancy:</span> {{$company->job->count()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="employers-details-content">
                    <h3>About Company</h3>
                    <p>
                        {{$company->introduction}}
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="employers-details-sidebar">
                    <div class="employer-widget">
                        <h3 style="color: #ffffff;">Company Overview</h3>

                        <ul class="overview">
                            <li>
                                Posted Job
                                <span>: {{$company->job->count()}}</span>
                            </li>
                            {{-- <li>
                                Established
                                <span>: 01/01/10</span>
                            </li>
                            <li>
                                Employees
                                <span>: 100-200</span>
                            </li> --}}
                            <li>
                                Location
                            <span >: {{$company->location}}</span>
                            </li>
                            <li>
                                Email
                            <span>: {{$company->email}}</span>
                            </li>
                            <li>
                                Call
                            <a href="tel:+1-(514)-7939-357"><span>: {{$company->phone}}</span></a>
                            </li>
                            <li>
                                Website
                            <a href="{{$company->website}}"><span>: {{$company->website}}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Employers Details Area -->

@endsection
