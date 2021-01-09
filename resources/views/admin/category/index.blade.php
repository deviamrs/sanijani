@section('title' , 'Super Category -- List' )
    

@extends('layouts.app')

@section('content')

<div class="row">
   <!-- Datatables -->
  
   <!-- DataTable with Hover -->
   <div class="col-lg-12">
     <div class="card mb-4">
       <div class="card-header py-3 d-flex flex-row justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">
          Category Listing
        </h6>
        @if ($categories->count() > 0)       
        <div class="d-flex justify-content-end pt-3" >
          <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Add category</a>   
          </div>    
        @endif 
       </div>
      
       @if ($categories->count() > 0)
       <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover">
           <thead class="thead-light">
             <tr>

               <th>#</th>
               <th>Name</th>
               {{-- <th>Supercategory Name</th> --}}
               <th>Post Count</th>
               <th>Action</th>  
               <th>Action</th>  
             </tr>
           </thead>
           <tbody>  
               @foreach ($categories as $category)
                   <tr>
                      <th>#</th>
                      <td>
                         {{ $category->name  }} 
                      </td>
                      {{-- <td>
                        <a href="{{ route('supercategory.index') }}" class="" >{{ $category->supercategory->name }} </a>
                      </td> --}}
                      <td><a href="{{ route('post.bycategory' , $category->id ) }}" class="btn btn-sm btn-success">{{ $category->posts->count() }}</a></td>
                      <td>
                        <a href="{{ route('category.edit' , $category->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Edit</span>
                         </a>
                      </td>
                      <td>
                         <form action="{{ route('category.destroy' , $category->id) }}" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span></button>
                         </form>   
                      </td>

                   </tr>
               @endforeach
           </tbody>
         </table>
       </div>
       @else
         @include('includes.nodata', ['data' => "Sorry No Category Found" , 'route_name' => 'category'])
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