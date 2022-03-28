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
                <h1 style="color:#ffffff; font-size:50px">Companies Subscription</h1>
                <h3 style="color:#ffffff; font-size:50px">    {{$result}}</h3>

                {{--                <p style="color:#F78154;">--}}
                {{--                    <a href={{route('home')}} style="color: #ffffff;">--}}
                {{--                    Home /--}}
                {{--                    </a>--}}

                {{--                    Company Dashboard--}}
                {{--                </p>--}}
            </div>
        </div>

    </section>
    <div id="section">

    </div>
    <!-- Start Job Listing Area -->
    {{--    <section class="candidates-dashboard-area ptb-100">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}

    {{--                <div class="col-lg-12">--}}
    {{--                    <div class="candidates-dashboard-content">--}}
    {{--                        <div class="candidates-dashboard">--}}
    {{--                            <h3>Subscription</h3>--}}

    {{--                            <div class="row">--}}
    {{--                                @foreach($data as $subscription)--}}
    {{--                                    <div class="col-lg-4 col-md-6">--}}
    {{--                                        <div class="single-pricing-box">--}}
    {{--                                            <div class="pricing-title">--}}
    {{--                                                <h1>{{$subscription->title}}</h1>--}}
    {{--                                                <h4>{{$subscription->price?'$'.$subscription->price :'Free'}}</h4>--}}
    {{--                                            </div>--}}

    {{--                                            <ul>--}}
    {{--                                                @foreach($subscription->description as $description )--}}
    {{--                                                    <li>--}}
    {{--                                                        <i class="bx bx-check"></i>--}}
    {{--                                                        {{$description['title']}}--}}
    {{--                                                    </li>--}}
    {{--                                                @endforeach--}}
    {{--                                            </ul>--}}
    {{--                                            @if (Auth::guard('company')->check())--}}
    {{--                                                <a href="log-in.html" class="default-btn">--}}
    {{--                                                    Get Started--}}
    {{--                                                </a>--}}
    {{--                                            @else--}}

    {{--                                                <a href="{{url('/login-page?type=employers')}}" class="default-btn">--}}
    {{--                                                    Apply Now--}}
    {{--                                                </a>--}}

    {{--                                            @endif--}}


    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- End Job Listing Area -->--}}
    {{--    <script>--}}
    {{--        function searchFunction(e) {--}}
    {{--            e.preventDefault();--}}
    {{--            if (e.target.value) {--}}
    {{--                console.log(e.target.value)--}}
    {{--                var a = document.getElementById('search-route');--}}
    {{--                a.href = `{{url('job-listing/?search=${e.target.value}')}}`;--}}
    {{--            } else {--}}
    {{--                var a = document.getElementById('search-route');--}}
    {{--                a.href = `{{url('job-listing')}}`;--}}
    {{--            }--}}
    {{--        }--}}

    {{--        window.onload = function () {--}}
    {{--            var elmnt = document.getElementById("section");--}}
    {{--            elmnt.scrollIntoView({behavior: "smooth", block: "start", inline: "start"});--}}
    {{--        }--}}
    {{--    </script>--}}


@endsection
