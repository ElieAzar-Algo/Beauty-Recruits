@extends('layouts.login')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Start Recruiting Now</h2>
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
    @if (\Session::has('failed_login'))
        <div id="login-alert"
            class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"
            role="alert" data-brk-library="component__alert">

            <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
            {!! \Session::get('failed_login') !!}

            <button onclick="closeFuctionLogin()" style="float:right;background-color:#faebd6;" type="button"
                    class="close font__size-18" data-dismiss="alert">
            <span aria-hidden="true">
              <i class="fa fa-times warning"></i>
            </span>

            </button>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-sm-6 offset-sm-3 d-flex p-2">
            <button
                style="height:300px; background-color:#F78154;  margin-right:20px; font-size:40px; font-weight:900; color:white"
                onclick="showApplicantForm()" class="btn w-50">Job Seekers
            </button>
            <button style="height:300px; background-color:#336161 ;  font-size:40px; font-weight:900; color:white"
                    onclick="showCompanyForm()" class="btn w-50">Employers
            </button>
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
                        <h3 style="color: #ffffff;">Login as Job Seeker</h3>

                        <form class="user-form" action="{{url(env('APP_URL').'applicant/login')}}" method="post">
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
                                <div class="col-12">
                                    <a href="{{url(env('APP_URL').'company-reset-password')}}"> Reset Password  </a>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div hidden id="company-form" class="user-form-content log-in-50">
                        <h3 style="color: #ffffff;">Login as an Employer</h3>

                        <form class="user-form" action="{{url(env('APP_URL').'company/login')}}" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email" >
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
                                <div class="col-12">
                                    <a href="{{url(env('APP_URL').'company-reset-password')}}">  Reset Password  </a>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End User Area -->
@endsection
