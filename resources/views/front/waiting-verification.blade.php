@extends('layouts.register')

@section('content')
<style>
    h1{
        text-align: center;
        align-content: center;
        align-self: center;
    }

    h2{
        text-align: center;
        align-content: center;
        align-self: center;
        margin-top: 200px;
    }

    .main{
        width: 100%;
        align-items: center;
      
    }
    
    .bkrgd{
        background-color: #336161;
        color: #336161;

        border: 1px black;
        height: 500%;
        width: 100%;
    }

</style>

<!-- <section class="banner-area ptb-100"
        style="background-image: url('assets/images/welcome-image.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;"> -->
        <section class="banner-area ptb-100"
        >           
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-7 main">
                            <div class="banner-content">
                                <div class="page-title-content" >
                                    <h2 style="color: #336161;"  >Please wait for the admin to verify your account</h2>
                                     {{-- <p style="color: #F78154;">
                                        <a href={{route('home')}}>
                                            Home 
                                        </a>
											
												Alert
										</p>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    
@endsection