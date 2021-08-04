


<style>
    html, body {
  margin:0px;
  overflow-y: hidden; 
}
    .imgclass{
        
        color: black;
        border: 1px solid black;
       
    }

    .bkgrd{
        height: 100%;
        width: 100%;
    }

    .full{ 
       overflow: auto;  
    }
    .grad{

        /* width: 450px;
        height: 100px; */

        width: 100vw;
        height: 100vh;
        
        background: rgb(247,129,84);
        background: linear-gradient(319deg, rgba(247,129,84,1) 12%, rgba(51,97,97,1) 86%);
        /* position: fixed 100vh 100vw; */
        
    }


    .text{
        color: white;
        /* margin-bottom: 400px; */
       /* font-size: 26pt; */
       font-size: 35.7px;
       margin: auto;
       padding-left: 50px;
       
    
        
        
    }

    h2
    {
        color: white;
        margin-bottom: 400px;
       font-size: 25pt;
    
        
    }

    h3{
        color: white;
       
        text-align: center;

        margin-top: 350px;
    }

    .center{
       
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        /* border: 5px solid #000000; */
        padding: 0px;
        }


    .containerr{
            position: relative;
            width: auto;
            height: auto;
        }

    .centered   {
    
        /* position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
       
        padding: 10px; */

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: auto;                  
    } 

    .expl{
        position: absolute;
        margin-bottom: 150px;


        /* margin-top: auto; */
      
    }

    
    
</style>

<div class="grad">
    <div>
        <section class="full">
            <div class="containerr-fluid">
                <div class="center">
                    <img src="assets/images/logo-white.png" alt="image"  height="300px" width="300px">
                </div>
                <div class="centered">
                    <h2> One last step! check your email to verify</h2>  
                </div>
            </div>
        </section>
</div>   

</div>
    


{{-- @section('content')

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
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection --}}