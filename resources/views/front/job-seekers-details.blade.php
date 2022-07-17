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
                <div class="employers-details-sidebar">
                    <div class="employer-widget">
                        <h3 style="color: #ffffff;">Company Overview</h3>

                        <ul class="overview">
                            <li>
                                Full Name
                                <span>: {{$company->full_name}}</span>
                            </li>
                            <li>
                                User Name
                                <span>: {{$company->username}}</span>
                            </li>
                            <li>
                                Job title
                                <span>: {{$company->description}}</span></a>
                            </li>
                            <li>
                                Years Of Experience
                                <a>
                                    {{--                                href="{{$company->website}}">--}}
                                    <span>: {{$company->years_of_experience}}</span></a>
                            </li>
                            <li>
                                Location
                            <span >: {{$company->location}}</span>
                            </li>
                            <li>
                                description
                            <span>: {{$company->description}}</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <a class="default-btn"
                   {{--                                    /storage/applicant-resumes/MyResume-admin2021-11-11-07-12-52pm.pdf--}}
                   {{--@if(!$item->userId)--}}
                   @if($showLink)
                       @if($company->resume_pdf )
                           href="{{route('applicant-listing-pdf',['id'=>$company->id])}}"
                   {{--                                               href="{{url('/storage/'.$item->resume_pdf)}}"--}}
                   @endif
                   @else
                       style="color: currentColor;
                                           cursor: not-allowed;
                                           opacity: 0.5;
                                           text-decoration: none;"
                    @endif

                >
                    View Resume
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Employers Details Area -->

@endsection
