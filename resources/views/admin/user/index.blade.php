@extends('layouts.app')

@section('title' , 'Users -- List' )


@section('content')
   
   <h3 class="h3" > Users List</h1>
    
   <div class="card mb-4" >
      <div class="d-flex justify-content-end p-2" >
         <a href="{{ route('user.create') }}" class="btn btn-primary">Add user</a>   
         </div>      
         <hr>
        @if (count($users) > 0)
          
        <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover">
            <thead class="thead-light">
              <th> #</th>   
              <th> Image</th>   
              <th> User Name</th> 
              <th>Email</th>  
              <th> Gender</th>
              <th class="text-center"> No of Blogs </th>   
              <th> Permission</th>
              <th>Edit</th>   
              <th> Action</th>     
            
            </thead>   
            <tbody>
               @foreach ($users as $user)     
                 <tr>
                     <td role="th">#</td>
                     <td><img src="{{ asset('public'.$user->profile->avatar ) }}" alt="" style="width:60px;height:60px;border-radius:50%"></td>
                     <td>{{ $user->name}}</td>
                 <td>{{ $user->email }}</td>
                     <td class="text-capitalize">{{ $user->profile->gender }}</td>
                     <td class="text-center" >
                     <a href=" {{ route('post.byUser' , $user->id) }}" class="btn btn-primary btn-sm"> {{ $user->posts->count() }}</a>
                     </td>
                     
                     <td>
                     @if ($user->role_id)
                        @if (Auth::user()->id !== $user->id)
                        <a href="{{ route('user.killadmin' , $user->id ) }}" class="btn btn-warning btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Remove Access</span> </a>
                        @else
                         Admintrator 
                        @endif
                     @else 
                      

                      <a href="{{ route('user.makeadmin' , $user->id ) }}" class="btn btn-success btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                           <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Make Admin</span> </a>
                     @endif 
                              
                     </td>
                     <td>
                        <a href="{{ route('profile.edit' , $user->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Edit</span>
                         </a>
                      </td>
                     <td>
                        @if (Auth::user()->id !== $user->id)
                        <form action=" {{ route('user.destroy' , $user->id) }}" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span></button>
                        </form>
                        @else   
                          <span class="text-danger"><i class="fas fa-user-shield"></i></span> 
                        @endif 
                     </td>
                 </tr>
               @endforeach
            </tbody>
         </table> 
        </div>

          
        @else
         
        @include('includes.nodata', ['data' => "Sorry No User Found" , 'route_name' => 'user'])
        @endif  

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