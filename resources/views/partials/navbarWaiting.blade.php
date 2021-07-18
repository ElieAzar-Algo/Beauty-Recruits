<!-- Start Header Area -->
<!-- Bootstrap Min CSS --> 
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Owl Theme Default Min CSS --> 
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
<!-- Owl Carousel Min CSS --> 
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<!-- Animate Min CSS --> 
<link rel="stylesheet" href="assets/css/animate.min.css">
<!-- Boxicons Min CSS --> 
<link rel="stylesheet" href="assets/css/boxicons.min.css"> 
<!-- Magnific Popup Min CSS --> 
<link rel="stylesheet" href="assets/css/magnific-popup.min.css"> 
<!-- Flaticon CSS --> 
<link rel="stylesheet" href="assets/css/flaticon.css">
<!-- Meanmenu Min CSS -->
<link rel="stylesheet" href="assets/css/meanmenu.min.css">
<!-- Nice Select Min CSS -->
<link rel="stylesheet" href="assets/css/nice-select.min.css">
<!-- Odometer Min CSS-->
<link rel="stylesheet" href="assets/css/odometer.min.css">
<!-- Date Picker CSS-->
<link rel="stylesheet" href="assets/css/date-picker.min.css">
<!-- Muli Fonts Min CSS-->
<link rel="stylesheet" href="assets/css/muli-fonts.css">
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="assets/css/responsive.css">

<!-- Favicon -->
<link rel="icon" type="image/png" href="assets/images/icon/favicon.png">
<header class="header-area">
			
    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="mobile-nav">
            <div class="container">
                <div class="mobile-menu">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logoo.png" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/images/logoo.png" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link active" style="color:#F78154">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="job-listing.html" class="nav-link">
                                    Jobs
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="candidates-listing.html" class="nav-link">
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
                        @else
                        <div class="others-option">
                            {{-- <div class="get-quote">
                                <a href="{{url('/register-page')}}" class="default-btn" style="background-color: #336161;">
                                    Register
                                </a>
                            </div> --}}
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
                            {{-- <div class="get-quote">
                                <a href="{{url('/register-page')}}" class="default-btn" style="background-color: #336161;">
                                    Register
                                </a>
                            </div> --}}
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
 <!-- Jquery Min JS -->
 <script src="assets/js/jquery.min.js"></script>
 <!-- Bootstrap Min JS -->
 <script src="assets/js/bootstrap.bundle.min.js"></script>
 <!-- Meanmenu Min JS -->
 <script src="assets/js/meanmenu.min.js"></script>
 <!-- Wow Min JS -->
 <script src="assets/js/wow.min.js"></script>
 <!-- Owl Carousel Min JS -->
 <script src="assets/js/owl.carousel.min.js"></script>
 <!-- Nice Select Min JS -->
 <script src="assets/js/nice-select.min.js"></script>
 <!-- Magnific Popup Min JS -->
 <script src="assets/js/magnific-popup.min.js"></script>
 <!-- Mixitup Min JS --> 
 <script src="assets/js/mixitup.min.js"></script>
 <!-- Appear Min JS --> 
 <script src="assets/js/appear.min.js"></script>
 <!-- Odometer Min JS --> 
 <script src="assets/js/odometer.min.js"></script>
 <!-- Range Slider Min JS --> 
 <script src="assets/js/range-slider.min.js"></script>
 <!-- Datepicker Min JS --> 
 <script src="assets/js/bootstrap-datepicker.min.js"></script>
 <!-- Form Validator Min JS -->
 <script src="assets/js/form-validator.min.js"></script>
 <!-- Contact JS -->
 <script src="assets/js/contact-form-script.js"></script>
 <!-- Ajaxchimp Min JS -->
 <script src="assets/js/ajaxchimp.min.js"></script>
 <!-- Custom JS -->
 <script src="assets/js/custom.js"></script>
<!-- End Header Area -->