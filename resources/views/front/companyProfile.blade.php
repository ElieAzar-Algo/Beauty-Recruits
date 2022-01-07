@extends('layouts.site')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Employer</h2>
            <ul>
                <li>
                    <a href={{route('home')}}>
                        Home
                    </a>
                </li>
                <li class="active">Employer Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Candidates Profile Area -->
<section class="candidates-profile-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="avatar-sidebar" style="margin-bottom:100px">
                    <h3>Profile</h3>

                    <div class="avatar-img">
{{--                        <img src="../assets/images/avatar-img.jpg" alt="Image">--}}

                        <div class="avatar-mane">
                        <h4>{{$company->username}}</h4>
                        <span>{{$company->field_expertise->expertise_name}}</span>
                        </div>
                    </div>

                    <ul>
                        <li>
                            <a class="active">Profile</a>
                        </li>
                        <li>
                            <a href="{{url('/company-post-job')}}">Post a Job</a>

                        </li>
                        <li>
                            <a href="pricing.html">Subscription</a>
                        </li>
                        <li>
                            <a href='/company-change-password?token={{auth()->user()->token}}'>Change Password</a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}">Log Out</a>
                        </li>
                    </ul>
                </div>


                <h3>My Jobs</h3>
                @foreach ($myJobs as $item)
                <div class="hot-jobs-list">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hot-jobs-content">
                            <h3><a href="job-details.html">{{$item->job_title}}</a></h3>

                                <ul>
                                <li><span>Job Type:</span> {{$item->job_type}}</li>
                                <li><span>Experience: </span>{{$item->years_of_experience}}</li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="hot-my-jobs-btn" style="width:10px;height:10px">
                            <a href="{{url('job-details/')}}/{{$item->id}}" style="width:10px;height:10px" class="default-btn">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-8">
                <div class="candidates-profile-content">
                    <form class="profile-info" action="{{url(env('APP_URL').'company-update')}}" method="POST">
                        <h3>Basic Info</h3>

                        <div class="row">
                            @csrf
                            <div hidden class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Method</label>
                                    <input type="hidden" name="method" value="PUT">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Compnay Name</label>
                                    <input value="{{ old( 'name', $company->name) }}" class="form-control" type="text" name="name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input value="{{ old('username', $company->username) }}" class="form-control" type="text" name="username">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{ old('email', $company->email) }}" class="form-control" type="email" name="email">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input value="{{ old('phone', $company->phone) }}"  class="form-control" type="text" name="phone">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input disabled value="{{ old('expertise_name', $company->field_expertise->expertise_name) }}" class="form-control" type="text" name="expertise_id">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Language</label>
                                    <select>
                                        <option value="1">English</option>
                                        <option value="2">العربيّة</option>
                                        <option value="2">Flag Germany</option>
                                        <option value="3">Flag Português</option>
                                        <option value="4">简体中文</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Introduction</label>
                                    <textarea  name="introduction" class="form-control" rows="6">
                                        {{old('', $company->introduction)}}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <h3>Address</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input  value="{{ old('location', $company->location) }}" class="form-control" type="text" name="location">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input  value="{{ old('website', $company->website) }}" class="form-control" type="text" name="website">
                                </div>
                            </div>

                            {{-- <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="email" name="City">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Post Code</label>
                                    <input class="form-control" type="text" name="Post-Code">
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Full Address</label>
                                    <input class="form-control" type="text" name="Category">
                                </div>
                            </div> --}}

                            <div class="col-lg-12">
                                <input type="submit" class="default-btn" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Candidates Profile Area -->

@endsection
