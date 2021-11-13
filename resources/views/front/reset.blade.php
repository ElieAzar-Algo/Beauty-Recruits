@extends('layouts.login')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Reset Password</h2>
                <ul>
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li class="active">Reset Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    @if (\Session::has('failed_login'))
        <div id="reset-alert"
             class="alert alert-danger"
{{--            class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"--}}
            role="alert" data-brk-library="component__alert">

            <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
            {!! \Session::get('failed_login') !!}

            <button onclick="closeFuctionReset()" style="float:right;background-color:#faebd6;" type="button"
                    class="close font__size-18" data-dismiss="alert">
            <span aria-hidden="true">
              <i class="fa fa-times warning"></i>
            </span>

            </button>
        </div>
    @endif

    <!-- Start User Area -->
    <section class="user-area pb-100 pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="margin: auto;">
                    <div class="user-form-content log-in-50">
                        <h3 style="color: #ffffff;">Reset Password</h3>

                        <form class="user-form" action="{{url(env('APP_URL').'applicant/reset-password')}}" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="default-btn" type="submit">
                                        Reset Password
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
@endsection
