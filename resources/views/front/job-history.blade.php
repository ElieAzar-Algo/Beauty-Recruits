@extends('layouts.site')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- url('{{asset('images/banners/March2019') }} --}}
    <section class="banner-area ptb-100"
             style="background-image: url('{{asset('public/assets/images/jobs.png')}}'); background-position:center;
                 background-attachment:fixed;
                 background-size:cover;
                 background-color:#336161;
                 width:100%;
                 height:750px;">

        <div class="container" style="text-align:center;margin-top:200px">
            <div id="banner" class="page-title-content">
                <h1 style="color:#ffffff; font-size:50px">Job Listing</h1>
                <p style="color:#F78154;">
                    <a href={{route('home')}} style="color: #ffffff;">
                    Home /
                    </a>

                    Job Listing
                </p>
            </div>
        </div>

    </section>
    <div id="section">

    </div>
    <!-- Start Job Listing Area -->
    <section class="job-listing-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach ($data as $item)
                        <div id="jobs" class="hot-jobs-list">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hot-jobs-content">
                                        <h3><a href="{{url('job-details/')}}/{{$item->id}}">{{$item->job_title}}</a>
                                        </h3>
                                        <span class="sub-title">{{$item->field_expertise->expertise_name}}</span>
                                        <ul>
                                            <li><span>Job Type:</span> {{$item->job_type}}</li>
                                            <li><span>Experience: </span>{{$item->years_of_experience}}</li>

                                            @if(isset( $item->company->location))
                                                <li><span>Location: </span>
                                                    {{$item->company->location}}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
{{--                                    <div class="hot-jobs-btn">--}}
{{--                                        <a href="{{url('job-details/')}}/{{$item->id}}" class="default-btn">Browse--}}
{{--                                            Job</a>--}}
{{--                                    </div>--}}
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
                        <div>
                            <input type='text' name='search' id='search' placeholder="Search..."
                                   onkeyup="searchFunction(event)" onblur="searchFunction(event)"/>

                            <a href="{{url('job-listing')}}" id="search-route" style="font-size: 1.5rem;"><i
                                    class="fa fa-search fa-x2"></i></a>
                        </div>

                        {{-- <div class="job-listing-widget">
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

                                            </label>
                                        </li>
                                        <li>
                                            <label class="single-check">

                                                <a href="{{url('job-listing/?experience=1')}}" type="link" checked="checked" name="radio-5">1 Year and above</a>

                                            </label>
                                        </li>
                                        <li>
                                            <label class="single-check">

                                                <a href="{{url('job-listing/?experience=3')}}" type="link" checked="checked" name="radio-5">3 Years and above</a>

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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Job Listing Area -->
    <script>
        function searchFunction(e) {
            e.preventDefault();
            if (e.target.value) {
                console.log(e.target.value)
                var a = document.getElementById('search-route');
                a.href = `{{url('job-listing/?search=${e.target.value}')}}`;
            } else {
                var a = document.getElementById('search-route');
                a.href = `{{url('job-listing')}}`;
            }
        }

        window.onload = function () {
            var elmnt = document.getElementById("section");
            elmnt.scrollIntoView({behavior: "smooth", block: "start", inline: "start"});
        }
    </script>


@endsection
