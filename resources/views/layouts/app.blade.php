<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href=" {{ asset('public/adminDesign/img/logo/logo.png') }} " rel="icon">
  <title>@yield('title') - Dashboard</title>
  @yield('custom_Css')
  <link href=" {{ asset('public/adminDesign/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('public/adminDesign/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('public/adminDesign/css/ruang-admin.min.css') }} " rel="stylesheet">
  @yield('style_inner')
</head>
<body id="page-top">
  <div id="app">
     <div id="wrapper" style="min-height: 100vh">
    <!-- Sidebar -->    
    @auth
       @includeIf('includes.sidebar') 
    @endauth


    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @auth
           @includeIf('includes.header')
        @endauth 
      

        <!-- Topbar -->

        <!-- Container Fluid-->
         
          <div class="container-fluid" >
            @if (session()->has('success'))
            <div class="col-md-5"> <div class="alert alert-success"> {{session()->get('success')}}</div></div>
            @endif
            @if (session()->has('warning'))
            <div class="col-md-5"><div class="alert alert-warning">{{session()->get('warning')}}</div></div> 
            @endif 
            @if (session()->has('danger'))
            <div class="col-md-5"><div class="alert alert-danger">{{session()->get('danger')}}</div></div> 
            @endif 
                @yield('content')
           
             
          </div>
        
        
         
         
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     
      <!-- Footer -->
    </div>
  </div>
</div>
 
{{-- id with apptag closes from here --}}

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  {{-- <script src="{{ asset('js/app.js') }} "></script>   --}}
  <script src="{{ asset('public/adminDesign/vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('public/adminDesign/vendor/bootstrap/js/bootstrap.bundle.min.js ') }} "></script> 
  <script src="{{ asset('public/adminDesign/vendor/jquery-easing/jquery.easing.min.js') }} "></script>
  <script src="{{ asset('public/adminDesign/vendor/chart.js/Chart.min.js ') }} "></script>
  <script src="{{ asset('public/adminDesign/js/demo/chart-area-demo.js') }} "></script> 
  <script src="{{ asset('public/adminDesign/js/ruang-admin.min.js') }} "></script>
   

  @yield('custom_JS')
  
</body>

</html>


