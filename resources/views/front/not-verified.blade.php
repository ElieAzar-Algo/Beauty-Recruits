@extends('layouts.login')

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
</style>

<section class="banner-area ptb-100"
        >           
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-7 main">
                            <div class="banner-content">
                                <div class="page-title-content" >
                                    <h2 style="color: #336161;"  >Please check your email in order to verify your account</h2>
                                    <!-- <p style="color: #F78154;">
											<a href="index.html" style="color: #ffffff;">
													Home /
												</a>
											
												Companies
										</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection