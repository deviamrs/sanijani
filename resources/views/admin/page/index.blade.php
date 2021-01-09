@section('title' , 'Blog page -- Listing' )
    

@extends('layouts.app')

@section('content')

<div class="row">
   <!-- Datatables -->
  
   <!-- DataTable with Hover -->
   <div class="col-lg-12">
     <div class="card mb-4">
       
        
    
       @if ($pages->count() > 0)
       <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover" >
           <thead class="thead-light">
             <tr>
               <th>Sr.No.</th>   
               <th>page Main Head</th>
               <th>Banner Image</th>
                                               
               <th>Action</th>  
              
               <th>Created At</th>  
             </tr>
           </thead>
           {{-- <tfoot>
             <tr>
               <th>Name</th>
               <th>Category Count</th>
               <th>Action</th>    
               <th>Action</th>    
             </tr>
           </tfoot> --}}
           <tbody>  
               @foreach ($pages as $key=>$page)
                   <tr>
                      <td>{{ $key+1 }}</td>     
                      <td>
                        {{ $page->page_name  }} 
                      </td>
                       <td>
                         @if ($page->page_banner !== null)
                         <img src="{{ asset('public/'. $page->page_banner) }}" alt="image_not_loaded" width="65">
                         @else
                         <button class="btn btn-sm btn-danger" disabled>N / A</button> 
                         @endif
                        </td>
                      <td>
                        <a href="{{ route('page.edit' , $page->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Edit</span>
                         </a>
                      </td>
                      
                     
                      <td>
                        {{ $page->created_at->diffForHumans() }}
                      </td>
                     


                   </tr>
               @endforeach
           </tbody>
         </table>
       </div>
       @else
          
         
            @include('includes.nodata', ['data' => "Sorry 0 page Found" , 'route_name' => 'page'])  
         

       @endif
     </div>
   </div>
 </div>




@endsection


@section('custom_JS')
<script src="{{asset('public/adminDesign/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/adminDesign/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>
@endsection