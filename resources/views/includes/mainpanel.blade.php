<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"> </h1>
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="./">Home</a></li>
       <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
     </ol>
   </div>

   <div class="row mb-3">
     <!-- Earnings (Monthly) Card Example -->
    

           
     @foreach ($frontdata as $key => $data)
     <div class="col-xl-3 col-md-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total {{ $key }} Count</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data }}</div>
             
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-pie fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endforeach


   </div>
   <!--Row-->

   <div class="row">
     <div class="col-lg-12 text-center">
       <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin"
           class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
     </div>
   </div>

 </div>

