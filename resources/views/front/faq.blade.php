@extends('layouts.site')

@section('content')

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>FAQ</h2>
            <ul>
                <li>
                <a href="{{route('home')}}">
                        Home
                    </a>
                </li>
                <li class="active">FAQ</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start FAQ Area -->
<section class="faq-area faq-area-about-page ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <div class="faq-title">
                        <h2>Frequently Asked Questions?</h2>
                    </div>

                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title active" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                How do I post a job?
                            </a>

                            <div class="accordion-content show">
                                <p>
                                    Just register your company and once you are validated you
                                    can begin posting a job. It’s that simple!
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                How long will my job posting be live?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    Your job post is valid for the duration of your
                                    subscription. You can renew at anytime.
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                How can I unsubscribe from your mailing list?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    To be removed from our mailing list, send us an Email with
                                    the subject unsubscribe and we will handle the rest.
                                    Please allow 48 hours for the system to update.
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                Are there any charges to register on Beauty Recruits?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    As a Job Seeker: There are no charges to register and have
                                    your CV listed for employers to browse and select.
                                    <br /><br />
                                    As an Employer: registration is free. You will only be
                                    charged for the plans you choose to subscribe.
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                Are opportunities available Worldwide?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    Yes, you can easily select the country you are interested
                                    in and find positions available, if any.
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                Is my job post guaranteed that I will find the right
                                jobseeker for my company?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    Although we cannot guarantee the outcome of your posted
                                    position, we do believe if the right plan is selected,
                                    Employers will have a much better chance in finding the
                                    perfect candidate.
                                </p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                How can I contact Beauty Recruits?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    You can send us an email at
                                    <i
                                    ><b
                                        ><span style="color: #f78154"
                                            >admin@beauty-recruits.com
                          </span></b
                                        ></i
                                    >
                                    <br /><br />Please allow up to 48 hours for us to revert.
                                </p>
                            </div>
                        </li>

                        <!-- test section  -->

                        <!-- test section  -->

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff"></i>
                                I forgot my password! How can I change it?
                            </a>

                            <div class="accordion-content">
                                <p>
                                    Go to the login section and press “reset password” and
                                    enter your email address and click “reset password” ,
                                    Success notification will prompt you; “password reset link
                                    has been sent to your email” Check your email for the link
                                    and follow instructions to change your password.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- <div class="col-lg-6">
                          <div class="faq-img">
                              <img src="assets/images/faq.png" alt="Image">
                          </div>
                      </div> -->
        </div>
    </div>
</section>
<!-- End FAQ Area -->

@endsection
