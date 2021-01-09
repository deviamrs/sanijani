<div class="text-center p-5">
   <div style="font-size: 10vw" class="">
      <i class="fas fa-sad-tear"></i> 
   </div>
    <h3>{{ $data }}</h3>
    <div>
        @isset($route_name)
        <a href="{{ route(  $route_name.'.create') }}" class="btn btn-primary text-capitalize"><i class="fas fa-pen"></i> Add {{ $route_name }} </a>  
        @endisset
      
      
      </div> 
</div>