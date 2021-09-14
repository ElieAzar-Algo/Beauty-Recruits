@extends('layouts.site')
@section('content')

<section class="banner-area ptb-100" style="background-image: url('assets/images/welcome-image.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="banner-content">
                            <div class="page-title-content">
                                <h1 style="color: #ffffff;">Employers Listing</h1>
                                <p style="color: #F78154;">
                                    <a href={{route('home')}} style="color: #ffffff;">
                                        Home /
                                    </a>
                                    
                                        Companies
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Employers Listing Area -->
<section class="employers-listing-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {{-- <ul class="shorting-menu">
                    <li class="filter" data-filter="all">
                        All
                    </li>

                    <li class="filter" data-filter=".a">
                        A
                    </li>

                    <li class="filter" data-filter=".b">
                        B
                    </li>

                    <li class="filter" data-filter=".c">
                        C
                    </li>  

                    <li class="filter" data-filter=".d">
                        D
                    </li>

                    <li class="filter" data-filter=".e">
                        E
                    </li> 
                    <li class="filter" data-filter=".f">
                        F
                    </li> 
                    <li class="filter" data-filter=".g">
                        G
                    </li> 
                    <li class="filter" data-filter=".h">
                        H
                    </li> 
                    <li class="filter" data-filter=".i">
                        I
                    </li> 
                    <li class="filter" data-filter=".j">
                        J
                    </li> 
                    <li class="filter" data-filter=".k">
                        K
                    </li> 
                    <li class="filter" data-filter=".l">
                        L
                    </li> 
                    <li class="filter" data-filter=".m">
                        M
                    </li> 
                    <li class="filter" data-filter=".n">
                        N
                    </li> 
                    <li class="filter" data-filter=".o">
                        O
                    </li> 
                    <li class="filter" data-filter=".p">
                        P
                    </li> 
                    <li class="filter" data-filter=".q">
                        Q
                    </li> 
                    <li class="filter" data-filter=".r">
                        R
                    </li> 
                    <li class="filter" data-filter=".s">
                        S
                    </li> 
                    <li class="filter" data-filter=".t">
                        T
                    </li> 
                    <li class="filter" data-filter=".u">
                        U
                    </li> 
                    <li class="filter" data-filter=".v">
                        V
                    </li> 
                    <li class="filter" data-filter=".w">
                        W
                    </li> 
                    <li class="filter" data-filter=".x">
                        X
                    </li> 
                    <li class="filter" data-filter=".y">
                        Y
                    </li> 
                    <li class="filter" data-filter=".z">
                        Z
                    </li> 
                </ul> --}}

   


                <div class="shorting">
                    <div class="row">

                        @foreach ($data as $item)
            
   
                        <div class="col-12 mix a s c">
                            <div class="hot-jobs-list">
                                <div class="row align-items-center">
                                    <div class="col-lg-2">
                                        <a href="employers-details.html" class="hot-jobs-img">
                                            <img src="assets/images/hot-jobs/hot-jobs-1.png" alt="Image">
                                        </a>
                                    </div>
            
                                    <div class="col-lg-5">
                                        <div class="hot-jobs-content">
                                        <h3><a href="{{url('company-details/')}}/{{$item->id}}">{{$item->name}}</a></h3>
                                        <span class="sub-title">{{$item->field_expertise->expertise_name}}</span>
                                            <ul>
                                            <li><span>Jobs:</span> {{$item->job->count()}}</li>
                                            <li><span>Location: </span>{{$item->location}}</li>
                                            <li><span>Website: </span> <a href="{{$item->website}}">Our Website</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="hot-jobs-btn">
                                        <a href="{{url('company-details/')}}/{{$item->id}}" class="default-btn">Browse Company</a>
                                        </div>
                                    </div>
            
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Employers Listing Area -->

    
@endsection