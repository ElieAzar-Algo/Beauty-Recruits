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
                                <i class="bx bx-plus" style="color: #ffffff;"></i>
                                How Do I Post a Job?
                            </a>

                            <div class="accordion-content show">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aliquam ut ad debitis maxime alias vitae magnam, accusamus amet pariatur tenetur totam deserunt dolore provident nobis impedit non vel quo? aliquam ut ad debitis maxime alias deserunt dolore provident</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff;"></i>
                                How Do I Edit or Remove a Job Posting?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aliquam ut ad debitis maxime alias vitae magnam, accusamus amet pariatur tenetur totam deserunt dolore provident nobis impedit non vel quo? aliquam ut ad debitis maxime alias deserunt dolore provident</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff;"></i>
                                How Long Will My Job Posting be Live?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aliquam ut ad debitis maxime alias vitae magnam, accusamus amet pariatur tenetur totam deserunt dolore provident nobis impedit non vel quo? aliquam ut ad debitis maxime alias deserunt dolore provident</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff;"></i>
                                How Can I Unsubscribe From Your Mailing List?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aliquam ut ad debitis maxime alias vitae magnam, accusamus amet pariatur tenetur totam deserunt dolore provident nobis impedit non vel quo? aliquam ut ad debitis maxime alias deserunt dolore provident</p>
                            </div>
                        </li>

                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="bx bx-plus" style="color: #ffffff;"></i>
                                How Can I Change My Password?
                            </a>

                            <div class="accordion-content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam aliquam ut ad debitis maxime alias vitae magnam, accusamus amet pariatur tenetur totam deserunt dolore provident nobis impedit non vel quo? aliquam ut ad debitis maxime alias deserunt dolore provident</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-img">
                    <img src="assets/images/faq-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ Area -->
    
@endsection