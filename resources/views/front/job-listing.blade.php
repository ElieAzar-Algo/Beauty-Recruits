@extends('layouts.site')

@section('content')
{{-- url('{{asset('images/banners/March2019') }} --}}
<section class="banner-area ptb-100" style="background-image: url('{{asset('assets/images/welcome-image.jpg')}}'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <div class="page-title-content">
                                <h1 style="color: #ffffff;">Job Listing</h1>
                                <p style="color: #F78154;">
                                    <a href={{route('home')}} style="color: #ffffff;">
                                            Home /
                                        </a>
                                    
                                        Job Listing
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Job Listing Area -->
<section class="job-listing-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @foreach ($data as $item)
                <div class="hot-jobs-list">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hot-jobs-content">
                            <h3><a href="job-details.html">{{$item->job_title}}</a></h3>
                                <span class="sub-title">{{$item->field_expertise->expertise_name}}</span>
                                <ul>
                                <li><span>Job Type:</span> {{$item->job_type}}</li>
                                <li><span>Experience: </span>{{$item->years_of_experience}}</li>
                                    <li><span>Location: </span>{{$item->company->location}}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="hot-jobs-btn">
                                <a href="job-details.html" class="default-btn">Browse Job</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="job-listing-sidebar">
                   

                    <div class="job-listing-widget">
                        <ul class="accordion-widget">
                            <li class="accordion-item">
                                <a class="accordion-widget-title active" href="javascript:void(0)">
                                    <h3 style="color: #ffffff; ">Experience</h3>
                                    <i class="bx bx-chevron-down" style="color: #ffffff; "></i>
                                </a>

                                <ul class="accordion-widget-content show">
                                    <li>
                                        <label class="single-check">
                                            
                                        <a href="{{url('job-listing/?experience=0')}}" type="link" checked="checked" name="radio-5" >All </a>
                                            {{-- <span class="checkmark"></span> --}}
                                        </label>
                                    </li>
                                    <li>
                                        <label class="single-check">
                                            
                                            <a href="{{url('job-listing/?experience=1')}}" type="link" checked="checked" name="radio-5">1 Year and above</a>
                                            {{-- <span class="checkmark"></span> --}}
                                        </label>
                                    </li>
                                    <li>
                                        <label class="single-check">
                                            
                                            <a href="{{url('job-listing/?experience=3')}}" type="link" checked="checked" name="radio-5">3 Years and above</a>
                                            {{-- <span class="checkmark"></span> --}}
                                        </label>
                                    </li>
                                    <li>
                                        <label class="single-check">
                                            
                                            <a href="{{url('job-listing/?experience=5')}}" type="link" checked="checked" name="radio-5">5 Years and above</a>
                                           
                                        </label>
                                    </li>
                                    <li>
                                        <label class="single-check">
                                           
                                            <a href="{{url('job-listing/?experience=7')}}" type="link"  name="radio-5">7 Years above</a>
                                           
                                        </label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Listing Area -->
    
@endsection