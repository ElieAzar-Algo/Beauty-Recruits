@extends('layouts.site')

@section('content')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 80%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    @keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 2px 16px;
      background-color: #3c6869;
      color: white;
    }
    .header-text
    {
        float:left;
        color:white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
      padding: 2px 16px;

      color: white;
    }
    .stamp {
    transform: rotate(12deg);
      color: #555;
      font-size: 3rem;
      font-weight: 700;
      border: 0.25rem solid #555;
      display: inline-block;
      padding: 0.25rem 1rem;
      text-transform: uppercase;
      border-radius: 1rem;
      font-family: 'Courier';
      -webkit-mask-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png');
    -webkit-mask-size: 944px 604px;
    mix-blend-mode: multiply;
  }

  .is-nope {
    color: #D23;
    border: 0.5rem double #D23;
    transform: rotate(3deg);
      -webkit-mask-position: 2rem 3rem;
    font-size: 2rem;
  }

  .stampDiv{
      margin-top: 2%;
      margin-bottom: -2%;
      margin-right:2%;
  }
    </style>

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Job Details</h2>
            <ul>
                <li>
                    <a href={{route('home')}} style="color: #336161;">
                        Home
                    </a>
                </li>
                <li class="active">Job Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Job Details Area -->
<section class="job-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hot-jobs-list">
                    <div class="row align-items-center">


                        <div class="col-lg-6">
                            <div class="hot-jobs-content">
                                <h1>{{$data->job_title}}</h1>
                            <h3 class="sub-title">{{$data->company->name}}</h3>
                            <h5>
                                {{$data->applicant->count()}}
                                @if ($data->applicant->count() < 2)
                                Applicant
                                @else
                                Applicants
                                @endif
                            </h5>

                            </div>
                        </div>


                        @if (Auth::guard('applicant')->check() && $indicator==0)
                        <div class="col-lg-4">
                            <div class="hot-jobs-btn">

                                <button id="myBtn" class="default-btn">Apply Now</button>
                            </div>
                        </div>
                        @elseif(Auth::guard('company')->check() || $indicator == '1' )
                        <div class="col-lg-4">
{{--                            <div disabled >--}}
{{--                                <a onclick="return false"; href="/" class="default-btn" style="pointer-events: none;--}}
{{--                                cursor: default; background-color:#f2b9a4">Apply Now</a>--}}
{{--                            </div>--}}
                        </div>
                        @else
                        <div class="col-lg-4">
                            <div class="hot-jobs-btn">
                                <a href="{{url('/login-page?type=seekers')}}" class="default-btn">Apply Now</a>
                            </div>
                        </div>
                        @endif
                        @if ($indicator == 1)
                        <div class="stampDiv">
                            <span class="float-right stamp is-nope">APPLIED</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="job-details-content">
                    <h3>Job Description</h3>
                <p>{{$data->job_description}}</p>


                    <h4>Experience Requirements:</h4>

                    <ul>

                    <li>{{$data->years_of_experience}} years of experience</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="job-details-sidebar">

                    <div class="job-widget">
                        <h3 style="color: #ffffff; ">Job Overview</h3>

                        <ul class="overview">
                            <li>
                                Published On
                            <span>{{$data->created_at}}</span>
                            </li>
                            <li>
                                Job Type
                            <span>{{$data->job_type}}</span>
                            </li>

                            <li>
                                Company Location
                            <span> {{$data->company->location}}</span>
                            </li>
                            <li>
                                Category
                            <span>{{$data->field_expertise->expertise_name}}</span>
                            </li>
                            {{-- <li>
                                Gender
                                <span>: Male</span>
                            </li> --}}
                            <li>
                                Monthly salary rate
                            <span>{{$data->salary}} USD</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::guard('company')->check() && Auth::guard('company')->id()==$data->company->id)
        <div class="row" style="margin-top: 100px">
            <h2 style="margin-bottom: 50px">Applicants</h2>
            @foreach ($data->applicant as $i)

            <div class="col-6">
                <div class="candidates-single-listing">
                    <div class="row align-items-center">
{{--                        <div class="col-lg-2">--}}
{{--                            <div class="hot-jobs-img">--}}
{{--                            <img src="{{'storage/'.$i->photo}}" alt="Image">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-lg-6">
                            <div class="candidates-cv-content">
                            <h3>{{$i->full_name}}</h3>

                                <ul>
                                <li><span>Location: </span>{{$i->location}}</li>
                                <li><span>Experience: </span>{{$i->years_of_experience}} years</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        <a href="{{url('/view-candidate/'.$i->id)}}" class="default-btn">View Candidate</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </div>
</section>
<!-- End Job Details Area -->

<div id="myModal" class="modal">
    <form action="{{url(env('APP_URL').'applicant-answer')}}" method="post">
    <!-- Modal content -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="header-text" style="color:white">Please answer on this question</h5>
        <span class="close">&times;</span>

      </div>
      <div class="modal-body">
      <p>{{$data->question}}</p>
      @csrf
        <input type="hidden" value={{$data->id}} name="job_id"/>
        <textarea name="answer" id="answer" cols="113" rows="5" placeholder="Insert your answer" required></textarea>

      </div>
      <div class="modal-footer">

            <div class="hot-jobs-btn">

                <input type="submit" id="myBtn" class="default-btn" value="Submit">
            </div>

      </div>

    </div>
</form>
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

@endsection
