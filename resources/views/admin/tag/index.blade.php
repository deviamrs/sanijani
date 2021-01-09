
   

    

@extends('layouts.app')

@section('title' , 'Super Category -- List')

@section('content')

<div class="row">
   <!-- Datatables -->
  
   <!-- DataTable with Hover -->
   <div class="col-lg-12">
     <div class="card mb-4">
       <div class="card-header py-3 d-flex flex-row  justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">Posts Tag Listing </h6>
         @if ($tags->count() > 0)
          
         <div class="d-flex justify-content-end" >
           <a href="{{ route('tag.create') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Add tag</a>   
           </div>    
         @endif 
       </div>
     


       @if ($tags->count() > 0)
       <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover" >
           <thead class="thead-light">
             <tr>
               <th>Name</th>
               <th>Post Count</th>
               <th>Action</th>  
               <th>Action</th>  
             </tr>
           </thead>
           <tbody>  
               @foreach ($tags as $tag)
                   <tr>
                      <td>
                         {{ $tag->name  }}
                      </td>
                      <td>
                       <a href="{{ route('post.bytag' , $tag->id) }}" class="btn btn-sm btn-success"> {{ $tag->posts->count() }} </a>
                      </td>
                      <td>
                        <a href="{{ route('tag.edit' , $tag->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Edit</span>
                         </a>
                      </td>
                      <td>
                         <form action="{{ route('tag.destroy' , $tag->id) }}" method="post">
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
         @include('includes.nodata', ['data' => "Sorry No Tag Found" , 'route_name' => 'tag'])
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
