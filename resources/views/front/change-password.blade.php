@extends('layouts.login')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Change Password</h2>
                <ul>
                    <li>
                        <a href="{{url('/home')}}">
                            Home
                        </a>
                    </li>
                    <li class="active">Change Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    @if (\Session::has('failed_login'))
        <div
            id="change-password-alert"
            class="alert alert-danger"
{{--            class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show"--}}
            role="alert" data-brk-library="component__alert">

            <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
            {!! \Session::get('failed_login') !!}

            <button onclick="closeFuctionChangePassword()" style="float:right;background-color:#faebd6;" type="button"
                    class="close font__size-18" data-dismiss="alert">
            <span aria-hidden="true">
              <i class="fa fa-times warning"></i>
            </span>

            </button>
        </div>
    @endif


    <!-- Start User Area -->
    <!-- Start User Area -->
    <section class="user-area pb-100 pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="margin: auto;">
                    <div class="user-form-content log-in-50">


                        <form class="user-form" action="{{url(env('APP_URL').'applicant/change-password')}}" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-12">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" value="{{$email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span hidden id="passwordMessage" style="color:red"> Password must contains at least one number, one lowercase, one uppercase letter, and six characters</span></label>
                                        <input required  onblur="check_Password(this.value)" id="applicantPassword" class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Confirm Password </label>
                                        <input required onblur="passwords(this.id,'applicantPassword','alertApplicantPassword')" id="applicantConfirmPassword" class="form-control" type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="default-btn" type="submit">
                                        Change Password
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
    <script type="text/javascript">
        var passwordValidator = true
        function check_Password(str)
        {
            console.log(str)
            // at least one number, one lowercase and one uppercase letter
            // at least six characters
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

            var passwordValidator = re.test(str)
            if(!passwordValidator){
                document.getElementById('passwordMessage').hidden = false
                document.getElementById('passwordMessage_2').hidden = false
            }else{
                document.getElementById('passwordMessage').hidden = true
                document.getElementById('passwordMessage_2').hidden = true
            }
        }

    </script>
@endsection
