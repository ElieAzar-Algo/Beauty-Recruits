<!doctype html>
<html lang="zxx">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
		<!-- Owl Theme Default Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/owl.theme.default.min.css')}}">
		<!-- Owl Carousel Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
		<!-- Animate Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/animate.min.css')}}">
		<!-- Boxicons Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/boxicons.min.css')}}"> 
		<!-- Magnific Popup Min CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.min.css')}}"> 
		<!-- Flaticon CSS --> 
		<link rel="stylesheet" href="{{URL::asset('assets/css/flaticon.css')}}">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/meanmenu.min.css')}}">
		<!-- Nice Select Min CSS -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/nice-select.min.css')}}">
		<!-- Odometer Min CSS-->
		<link rel="stylesheet" href="{{URL::asset('assets/css/odometer.min.css')}}">
		<!-- Date Picker CSS-->
		<link rel="stylesheet" href="{{URL::asset('assets/css/date-picker.min.css')}}">
		<!-- Muli Fonts Min CSS-->
		<link rel="stylesheet" href="{{URL::asset('assets/css/muli-fonts.css')}}">
		<!-- Style CSS -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
		
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="{{URL::asset('assets/images/icon/favicon.png')}}">
		<!-- Title -->
		<title>Beauty Recruits</title>
		
    </head>

    <body>
		
		@include('front.includes.guestNavbar')

		

		
		
		@yield('content')

		<!-- Start Footer Area -->
		@include('front.includes.footer')
		
		<!-- End Footer Area -->

		

        <!-- Jquery Min JS -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Meanmenu Min JS -->
		<script src="{{asset('assets/js/meanmenu.min.js')}}"></script>
		<!-- Wow Min JS -->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <!-- Owl Carousel Min JS -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Nice Select Min JS -->
		<script src="{{asset('assets/js/nice-select.min.js')}}"></script>
        <!-- Magnific Popup Min JS -->
		<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
		<!-- Mixitup Min JS --> 
		<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
		<!-- Appear Min JS --> 
        <script src="{{asset('assets/js/appear.min.js')}}"></script>
		<!-- Odometer Min JS --> 
		<script src="{{asset('assets/js/odometer.min.js')}}"></script>
		<!-- Range Slider Min JS --> 
		<script src="{{asset('assets/js/range-slider.min.js')}}"></script>
		<!-- Datepicker Min JS --> 
		<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
		<!-- Form Validator Min JS -->
		<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
		<!-- Contact JS -->
		<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
		<!-- Ajaxchimp Min JS -->
		<script src="{{asset('assets/js/ajaxchimp.min.js')}}"></script>
        <!-- Custom JS -->
		<script src="{{asset('assets/js/custom.js')}}"></script>
    </body>
</html>