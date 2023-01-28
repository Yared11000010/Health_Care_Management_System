
<html lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pages / Register - Admin Bootstrap Template</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{asset('backend/img/favicon.png')}}" rel="icon">
      <link href="{{asset('backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/bootstrap-icons.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/quill.snow.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/quill.bubble.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/remixicon.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/simple-datatables.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
 </head>
 <body>
    <main>
       <div class="container">
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
             <div class="container">
                <div class="row justify-content-center">
                   <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                      <div class="d-flex justify-content-center py-4"> <a href="index.html" class="logo d-flex align-items-center w-auto"> <img src="{{ asset('backend/img/logo.png') }}"> <span class="d-none d-lg-block">Admin</span> </a></div>
                      <div class="card mb-3">
                         <div class="card-body">
                            <div class="pt-4 pb-2">
                               <h5 class="card-title text-center pb-0 fs-4">Login With Your Account</h5>
                               <p class="text-center small">Enter your personal details to create account</p>
                            </div>
                            <form class="row g-3 needs-validation" method="POST" action="{{ url('loginadmin') }}" >
                                @csrf
                               <div class="col-12">
                                  <label for="email" class="form-label">Your Email</label> <input type="email" name="email" class="form-control" id="email" required="">
                                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                               </div>
                               
                               <div class="col-12">
                                  <label for="password" class="form-label">Password</label> <input type="password" name="password" class="form-control" id="yourPassword" required="">
                                  <div class="invalid-feedback">Please enter your password!</div>
                               </div>
                               
                               <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Login</button></div>
                               <div class="col-12">
                                  <p class="small mb-0">Already have'nt an account? <a href="{{ route('register') }}">Registration</a></p>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
       </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
    <script src="{{asset('backend/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/chart.min.js')}}"></script>
    <script src="{{asset('backend/js/echarts.min.js')}}"></script>
    <script src="{{asset('backend/js/quill.min.js')}}"></script>
    <script src="{{asset('backend/js/simple-datatables.js')}}"></script>
    <script src="{{asset('backend/js/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/js/validate.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body></html>