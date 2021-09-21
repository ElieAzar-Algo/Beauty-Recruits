<footer class="footer-area pt-100 pb-70" style="background-color: #336161;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget single-bg">
                    <a href={{route('home')}} class="logo">
                        <img src="assets/images/logo-footer.png" alt="Image">
                    </a>

                    <p  style="color: #ffffff;">Beauty-Recruits makes it easy for you to find your perfect job within all sectors of the hair, spa, medical spa and beauty industry. There are always hundreds of exciting job vacancies being advertised on our site.</p>

                    <ul class="social-icon">
                        {{-- <li>
                            <a href="#">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li> --}}
                        <li>
                            <a href="https://instagram.com/br.beautyrecruits?igshid=1kyn8e112nvcz" target="_blank">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://linkedin.com/in/beauty-recruits-10984821a"  target="_blank">
                                <i class="bx bxl-linkedin-square"></i>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3  style="color: #ffffff;">Contact</h3>

                    <ul class="address">
                        {{-- <li>
                            <i class="bx bx-phone-call" style="color: #F78154;"></i>
                            <span  style="color: #ffffff;">Phone:</span>
                            <a href="tel:+1-(514)-7939-357" style="color: #c3c3c3;">+1 (514) 7939-357</a>
                        </li> --}}
                        <li>
                            <i class="bx bx-envelope" style="color: #F78154;"></i>
                            <span  style="color: #ffffff;">Email:</span>
                            <a href="mailto:Admin@beauty-recruits.com"  style="color: #c2c2c2;">Admin@beauty-recruits.com </a>
                        </li>
                        <li class="location">
                            <i class="bx bx-location-plus" style="color: #F78154;"></i>
                            <span  style="color: #ffffff;">Address:</span>
                            <span  style="color: #c3c3c3;">PO box 118683, Dubai UAE</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3  style="color: #ffffff;">My Account</h3>

                    <ul class="import-link">
                        <li>
                            @if (Auth::guard('applicant')->check() || Auth::guard('company')->check())
                            <a style="color: #adadadbf;">Create Account</a>
                            @else
                            <a href="{{route('register')}}"  style="color: #ffffff;">Create Account</a>
                            @endif

                        </li>

                        <li>
                            @if (Auth::guard('applicant')->check() || Auth::guard('company')->check())
                            <a style="color: #adadadbf;">Login</a>
                            @else
                            <a href="{{url('/login-page')}}"  style="color: #ffffff;">Login</a>
                            @endif
                        </li>
                        <li>
                            <a href="{{route('company-listing')}}"  style="color: #ffffff;">Employers</a>
                        </li>
                        <li>
                            <a href="{{route('job-listing')}}" style="color: #ffffff;">Jobs</a>
                        </li>
                       
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3  style="color: #ffffff;">Customer Care</h3>

                    <ul class="import-link">
                        <li>
                            <a href="{{route('terms-conditions')}}"  style="color: #ffffff;">Terms of Use</a>
                        </li>
                        <li>
                            <a href="{{route('acceptable-use-policy')}}"  style="color: #ffffff;">Acceptable Use Policy</a>
                        </li>
                        <li>
                            <a href="{{route('disclaimers-page')}}"   style="color: #ffffff;">Disclaimer</a>
                        </li>
                        <li>
                            <a href="{{route('dmca-page')}}"  style="color: #ffffff;">DMCA Policy</a>
                        </li>
                        <li>
                            <a href="{{route('privacy-policy')}}"  style="color: #ffffff;">Privacy Policy</a>
                        </li>
                        
                        <li>
                        <a href="{{route('faq-page')}}"  style="color: #ffffff;">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


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