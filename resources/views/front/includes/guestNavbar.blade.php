
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{URL::asset('assets/images/icon/favicon.png')}}">
<header class="header-area">
			
    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="mobile-nav">
            <div class="container">
                <div class="mobile-menu">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{URL::asset('assets/images/logoo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{URL::asset('assets/images/logoo.png')}}" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href={{route('home')}} class="nav-link active" style="color:#F78154">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href={{route('job-listing')}} class="nav-link">
                                    Jobs
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href={{route('applicant-listing')}} class="nav-link">
                                    Candidates
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="employers-listing.html" class="nav-link">
                                    Companies
                                </a>
                            </li>
                            
                        </ul>
                        
                        <div class="others-option">
                            @if (Auth::guard('applicant')->check() || Auth::guard('company')->check())
                            <div class="get-quote">
                                <a href="{{url('/logout')}}" class="default-btn" style="background-color:  #F78154;">
                                    Logout
                                </a>
                            </div>

                            @if (Auth::guard('applicant')->check())
                                <div class="get-quote">
                                    <a href="{{url('/applicant-profile')}}" class="default-btn" style="background-color:  #336161;">
                                        My Profile
                                    </a>
                                </div>
                            @elseif(Auth::guard('company')->check())
                            <div class="get-quote">
                                <a href="{{url('/company-profile')}}" class="default-btn" style="background-color:  #336161;">
                                    My Profile
                                </a>
                            </div>
                        @endif
                        @else
                        
                        <div class="others-option">
                            <div class="get-quote">
                                <a href="{{url('/register-page')}}" class="default-btn" style="background-color: #336161;">
                                    Register
                                </a>
                            </div>
                            <div class="get-quote">
                                <a href="{{url('/login-page')}}" class="default-btn" style="background-color: #F78154;">
                                    Login
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                @if (Auth::guard('applicant')->check() || Auth::guard('company')->check())
                <div class="others-option justify-content-center d-flex align-items-center">
                    <div class="get-quote">
                        <a href="{{url('/logout')}}" class="default-btn" style="background-color:  #F78154;" >
                            Logout
                        </a>
                    </div>
                </div>
                @else
                <div class="container">
                    <div class="option-inner">
                        <div class="others-option justify-content-center d-flex align-items-center">
                            <div class="get-quote">
                                <a href="{{url('/register-page')}}" class="default-btn" style="background-color: #336161;">
                                    Register
                                </a>
                            </div>
                        </div>
                        <div class="others-option justify-content-center d-flex align-items-center">
                            <div class="get-quote">
                                <a href="{{url('/login-page')}}" class="default-btn">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
 