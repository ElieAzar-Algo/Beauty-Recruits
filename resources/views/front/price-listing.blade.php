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
                <p style="color:#F78154;">
                    <a href={{route('home')}} style="color: #ffffff;">
                    Home /
                    </a>

                    Company Dashboard
                </p>
            </div>
        </div>

    </section>
    <div id="section">

    </div>
    <!-- Start Job Listing Area -->
    <section class="candidates-dashboard-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="avatar-sidebar">
                        <h3>Profile</h3>

{{--                        <div class="avatar-img">--}}
{{--                            <img src="../assets/images/avatar-img.jpg" alt="Image">--}}

{{--                            <div class="avatar-mane">--}}
{{--                                <h4>Randall Guerrero</h4>--}}
{{--                                <span>UX/UI Designer</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <ul>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="post-job.html">Post a Job</a>
                            </li>
                            <li>
                                <a href="pricing.html" class="active">Subscription</a>
                            </li>
                            <li>
                                <a href="change-password.html">Change Password</a>
                            </li>
                            <li>
                                <a href="../log-in-register.html">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="candidates-dashboard-content">
                        <div class="candidates-dashboard">
                            <h3>Subscription</h3>

                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Basic</h1>
                                            <h4>Free</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                39 USD for each dowloaded CV
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Classic</h1>
                                            <h4>$49</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Up to 2 CV's to download
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Silver</h1>
                                            <h4>$99</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited cv searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Up to 5 cv's to download
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Bronze</h1>
                                            <h4>$149</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Up to 10 cv's to download
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Gold</h1>
                                            <h4>$179</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Up to 10 cv's to download
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>Platinum</h1>
                                            <h4>$199</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited cv searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Up to 10 cv's to download
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>CV ACCESS SILVER</h1>
                                            <h4>$99</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                10 cv's to download over 30 days
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>CV ACCESS  BRONZE</h1>
                                            <h4>$249</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited CV searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                35 CV's to download over 90 days
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                                    <div class="single-pricing-box">
                                        <div class="pricing-title">
                                            <h1>CV ACCESS  GOLD</h1>
                                            <h4>$499</h4>
                                        </div>

                                        <ul>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Job postings
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                Unlimited cv searching
                                            </li>
                                            <li>
                                                <i class="bx bx-check"></i>
                                                100 CV's to download over 6 months
                                            </li>
                                        </ul>

                                        <a href="log-in.html" class="default-btn">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
