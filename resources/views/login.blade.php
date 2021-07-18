<!doctype html>
<html lang="zxx">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
		<!-- Title -->
		<title>Beauty Recruits</title>
		
    </head>

    @if (Auth::guard('applicant')->check() || Auth::guard('company')->check())
    <div class="others-option justify-content-center d-flex align-items-center">
        <div class="get-quote">
            <a href="{{url('/logout')}}" class="default-btn" style="background-color:  #F78154;" >
                Logout
            </a>
        </div>
    </div>
    @else
    <body>
		
		<!-- Start Header Area -->
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
										<a href="index.html" class="nav-link">
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
									<div class="get-quote">
										<a href="{{url('/register-page')}}" class="default-btn" style="background-color: #336161;">
											Register
										</a>
									</div>
									{{-- <div class="get-quote">
										<a href="{{url('/login-page')}}" class="default-btn" style="background-color: #F78154;">
											Login
										</a>
									</div> --}}
								</div>
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
									{{-- <div class="get-quote">
										<a href="{{url('/login-page')}}" class="default-btn">
											Login
										</a>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Navbar Area -->
		</header>
		<!-- End Header Area -->

		<!-- Start Page Title Area -->
		<div class="page-title-area">
			<div class="container">
				<div class="page-title-content">
					<h2>Welcome Back</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li>
						<li class="active">Login</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<div class="row mt-4">
            <div class="col-sm-6 offset-sm-3 d-flex p-2">
                <button onclick="showApplicantForm()" class="btn btn-primary w-50">I am an Applicant</button>
                <button onclick="showCompanyForm()" class="btn btn-success w-50"  >I am a Company</button>
            </div>

		</div>
		@isset($message)
		<div>
			<div id="alertMessage" class="alert alert-danger" role="alert" onclick="closeAlert(this.id)">
				{{$message}}
			  </div>
		</div>
		@endisset

		<!-- Start User Area -->
		<section class="user-area pb-100 pt-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6" style="margin: auto;">
						<div hidden id="applicant-form" class="user-form-content log-in-50">
							<h3 style="color: #ffffff;">Log In as Applicant</h3>
						
							<form  class="user-form" action="{{url(env('APP_URL').'applicant/login')}}" method="post">
								<div class="row">
                                    @csrf
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="email">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Log In
										</button>
									</div>
								</div>
							</form>
						</div>

						<div hidden id="company-form" class="user-form-content log-in-50">
							<h3 style="color: #ffffff;">Log In as Company</h3>
						
							<form  class="user-form" action="{{url(env('APP_URL').'company/login')}}" method="post">
								<div class="row">
                                    @csrf
									<div class="col-12">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" name="email">
										</div>
									</div>
		
									<div class="col-12">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="password">
										</div>
									</div>
									<div class="col-12">
										<button class="default-btn" type="submit">
											Log In
										</button>
									</div>
								</div>
							</form>
						</div>


					</div>
				</div>
			</div>
		</section>
		<!-- End User Area -->

		<!-- Start Footer Area -->
		<footer class="footer-area pt-100 pb-70" style="background-color: #336161;">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget single-bg">
							<a href="index.html" class="logo">
								<img src="assets/images/black_logo_transparent_background.png" alt="Image">
							</a>

							<p  style="color: #ffffff;">Lorem ipsum dolor sit amet, consec tetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consec tetur.</p>

							<ul class="social-icon">
								<li>
									<a href="#">
										<i class="bx bxl-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="bx bxl-instagram"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="bx bxl-linkedin-square"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="bx bxl-twitter"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<h3  style="color: #ffffff;">Contact</h3>

							<ul class="address">
								<li>
									<i class="bx bx-phone-call" style="color: #F78154;"></i>
									<span  style="color: #ffffff;">Phone:</span>
									<a href="tel:+1-(514)-7939-357" style="color: #c3c3c3;">+1 (514) 7939-357</a>
								</li>
								<li>
									<i class="bx bx-envelope" style="color: #F78154;"></i>
									<span  style="color: #ffffff;">Email:</span>
									<a href="mailto:hello@jubi.com"  style="color: #c2c2c2;">hello@beauty-recruits.com</a>
								</li>
								<li class="location">
									<i class="bx bx-location-plus" style="color: #F78154;"></i>
									<span  style="color: #ffffff;">Address:</span>
									<span  style="color: #c3c3c3;">6890 Blvd, The Bronx, NY 1058 New York, USA</span>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<h3  style="color: #ffffff;">Companies</h3>

							<ul class="import-link">
								<li>
									<a href="log-in-register.html"  style="color: #ffffff;">Create Account</a>
								</li>
								<li>
									<a href="terms-conditions.html"  style="color: #ffffff;">Terms of Use</a>
								</li>
								<li>
									<a href="privacy-policy.html"  style="color: #ffffff;">Privacy Centre</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<h3  style="color: #ffffff;">Job Seekers</h3>

							<ul class="import-link">
								<li>
									<a href="job-listing.html"  style="color: #ffffff;">Jobs</a>
								</li>
								<li>
									<a href="employers-listing.html"  style="color: #ffffff;">Companies</a>
								</li>
								<li>
									<a href="log-in-register.html"  style="color: #ffffff;">Register</a>
								</li>
								<li>
									<a href="faq.html"  style="color: #ffffff;">FAQ</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer Area -->

		<!-- Start Copy Right Area -->
		<div class="copy-right-area">
			<div class="container">
				<p>
					Copyright <i class="bx bx-copyright"></i>2021 <b style="color: #F78154;">Beauty Recruits.</b>
				</p>
			</div>
		</div>
		<!-- End Copy Right Area -->
		
		<!-- Start Go Top Area -->
		<div class="go-top">
			<i class="bx bx-chevrons-up"></i>
			<i class="bx bx-chevrons-up"></i>
		</div>
		<!-- End Go Top Area -->
		<script>
			function showApplicantForm()
			{
				document.getElementById('applicant-form').hidden = !document.getElementById('applicant-form').hidden;
				document.getElementById('company-form').hidden = true;
			}

			function showCompanyForm()
			{
				document.getElementById('applicant-form').hidden =true;
				document.getElementById('company-form').hidden = !document.getElementById('company-form').hidden;
			}

			function closeAlert(id)
			{
				document.getElementById(id).hidden = true;	
			}
		</script>

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
    </body>
    @endif
</html>