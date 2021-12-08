@extends('layouts.site')

@section('content')
    <section class="banner-area ptb-100" style="background-image: url('public/assets/images/job-seekers.png'); background-position:center;
background-attachment:fixed;
background-size:cover;
background-color:#336161;
width:100%;
height:750px;">


        <div class="container" style="text-align:center; margin-top:200px">
            <div class="page-title-content">
                <h1 style="color: #ffffff; font-size:50px">Candidates Listing</h1>
                <p style="color: #F78154;">
                    <a href={{route('home')}} style="color: #ffffff;">
                    Home /
                    </a>

                    Candidates
                </p>
            </div>
        </div>

    </section>

    <!-- Start Candidates Listing Area -->
    <section class="candidates-listing-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach ($data as $item)


                        <div class="candidates-single-listing">
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="hot-jobs-img">
                                        <img src="{{'https://beauty-recruits.com/public/storage/'.$item->photo}}"
                                             alt="Image">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="candidates-cv-content">
                                        <h3>{{$item->full_name}}</h3>
                                        <span class="sub-title">{{$item->expertise_name}}</span>
                                        <ul>
                                            <li><span>Location: </span>{{$item->location}}</li>
                                            <li><span>Experience: </span>{{$item->years_of_experience}} years</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <a class="default-btn"
                                       @if($item->userId)
                                       href="{{url('/download-resume/'.$item->userId)}}"
                                       @endif
                                       @if(!$item->userId)
                                       style="color: currentColor;
                                           cursor: not-allowed;
                                           opacity: 0.5;
                                           text-decoration: none;"
                                       @endif

                                           >View Resume
                                           </a>
                                           </div>
                                           </div>
                                           </div>

                                       @endforeach

                                           <div>{{$data->links()}}</div>


                                       {{-- <div class="row">
                                           <div class="col-lg-12 col-md-12">
                                               <div class="pagination-area">
                                                   <span class="page-numbers current" aria-current="page">1</span>
                                                   <a href="#" class="page-numbers">2</a>
                                                   <a href="#" class="page-numbers">3</a>

                                                   <a href="#" class="next page-numbers">
                                                       <i class="flaticon-right-arrow"></i>
                                                   </a>
                                               </div>
                                           </div>
                                       </div> --}}
                                           </div>
                                           </div>
                                           </div>
                                           </section>
                                           <!-- End Candidates Listing Area -->
@endsection
