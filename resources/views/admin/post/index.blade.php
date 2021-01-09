@section('title' , 'Blog Post -- Listing' )
    

@extends('layouts.app')

@section('content')

<div class="row">
   <!-- Datatables -->
  
   <!-- DataTable with Hover -->
   <div class="col-lg-12">
     <div class="card mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">{{ isset($featured) ? 'Featured' : ''  }} {{ isset($username) ? $username : '' }} {{ isset($tagname) ? $tagname . ' Tag' : '' }} {{ isset($published) ? $published  : '' }} {{ isset($draft) ? $draft  : '' }}  Post Listing </h6>
         @if ($posts->count() > 0)
          
         <div class="d-flex justify-content-end" >
           <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fas fa-pen"></i> Add post</a>   
           </div>    
         @endif 
       </div>
        
    
       @if ($posts->count() > 0)
       <div class="table-responsive p-3">
         <table class="table align-items-center table-flush table-hover mb-5" id="dataTableHover" >
           <thead class="thead-light">
             <tr>
               <th>Sr.No.</th>   
               <th>Title</th>
               <th>Author</th>
               <th>Image</th>
               <th>Category</th>
               <th>Additonal Rows</th>
               <th>Featured Status</th>
               @if (Auth::user()->role_id)
                 <th>Featured Action</th>                     
               @endif 
               <th>Status</th> 
               @if (Auth::user()->role_id)
               <th>Status Action</th>                    
               @endif 
               <th>Action</th>  
               <th>Action</th>  
               <th>Edited At</th>  
               <th>Publish At</th>  
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
               @foreach ($posts as $key=>$post)
                   <tr>
                      <td>{{ $key+1 }}</td>     
                      <td>
                      <a href="{{ route('post.show' , $post->id ) }}">{{ $post->title }}</a> 
                      </td>
                      <td>
                         @if (Auth::user()->id == $post->user->id)
                            {{ 'Me' }} 
                         @else
                            {{ $post->user->name }}
                         @endif
                      </td>
                       <td>
                         <img src="{{ asset('public/'. $post->image) }}" alt="image_not_loaded" width="65">
                        </td>
                      <td>{{ $post->category->name }}</td>
                      <td> <a href="{{ route('postdescription.index' , $post->id) }}" class="btn btn-primary">{{ $post->postdescriptions->count() }}</a>  </td> 
                      <td>  
                        @if ($post->featured)           
                            <button class="btn btn-success btn-sm" >Featured </button>
                        @else
                            <a href="javscript:void(0)" class="btn btn-warning btn-icon-split btn-sm">
                          <span class="text">Not Featured</span> </a>
                        @endif       
                      </td>
                     
                      @if (Auth::user()->role_id)
                      <td>
                        @if ($post->featured)
                        <a href="{{ route('post.removefeatured' , $post->id ) }}" class="btn btn-danger btn-icon-split btn-sm">
                          <span class="text">Remove Featured</span> </a> 
                        @else
                        <a href="{{ route('post.setfeatured' , $post->id ) }}" class="btn btn-success btn-icon-split btn-sm">
                        
                          <span class="text">Set Featured</span> </a>
                        @endif 
                      </td>
                      @endif 

                      <td>  
                        @if ($post->publish)           
                            <button class="btn btn-success btn-sm" >Published</button>
                        @else
                            <a href="javscript:void(0)" class="btn btn-info btn-icon-split btn-sm">
                          <span class="text">Draft</span> </a>
                        @endif       
                      </td>
                      @if (Auth::user()->role_id)
                       <td>
                         @if ($post->publish)
                          <a href="{{ route('post.removepublish' , $post->id ) }}" class="btn btn-danger btn-icon-split btn-sm">
                          <span class="text"> Set Draft </span> </a> 
                        @else 
                        <a href="{{ route('post.setpublish' , $post->id ) }}" class="btn btn-success btn-icon-split btn-sm">
                              <span class="text">Publish </span> </a>     
                         @endif  

                       </td>
                       @endif 
                      <td>
                        <a href="{{ route('post.edit' , $post->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                           <span class="icon text-white-50">
                              <i class="fas fa-pen"></i>
                           </span>
                           <span class="text">Edit</span>
                         </a>
                      </td>
                      
                      <td>
                         <button type="button" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#delted-modal-{{$key+1}}">
                              <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">Delete</span>
                        </button>
                        <div class="modal fade" id="delted-modal-{{$key+1}}" tabindex="-1" role="dialog" aria-labelledby="delted-modal-{{$key+1}}-Label" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="delted-modal-{{$key+1}}-Label">Are You Sure</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  Are you Sure Want to Delete This Post , 
                                  This Will Delete the Post Permanently , <br> <br> The Post Is <br> {{$post->title}}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-icon-split btn-sm" data-dismiss="modal"><span class="icon text-white-50">
                                  <i class="fas fa-times-circle"></i>
                                </span>
                                <span class="text">Close</span></button>
                                <form action="{{ route('post.destroy' , $post->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50">
                                     <i class="fas fa-trash"></i>
                                   </span>
                                   <span class="text">Delete</span></button>
                                </form> 
                              </div>
                            </div>
                          </div>
                        </div>   
                      </td>
                      {{-- <td>
                        {{ $post->created_at->diffForHumans() }}
                      </td> --}}
                      <td>
                        {{  ($post->updated_at != null) ? $post->updated_at->format('d M Y')  : 'N/A'  }}
                      </td>
                      <td>
                         {{ ($post->publish_date != null) ? $post->publish_date->format('d M Y')  : 'N/A' }}
                      </td>


                   </tr>
               @endforeach
           </tbody>
         </table>
       </div>
       @else
          
         @if (isset($featured))

            @include('includes.nodata', ['data' => "Sorry No Featured Post Found" , 'route_name' => 'post'])     

         @elseif(isset($username))
            @include('includes.nodata', ['data' => "Sorry Uses has not any post yet " , 'route_name' => 'post'])

         @elseif(isset($tagname))

            @include('includes.nodata', ['data' => "Sorry This Tag is not associated With Any Post" , 'route_name' => 'post'])

         @elseif(isset($published))

            @include('includes.nodata', ['data' => "Sorry we dont have  Any published  Post" , 'route_name' => 'post'])
         @elseif(isset($draft))

            @include('includes.nodata', ['data' => "Sorry we dont have  Any Post In Draft" , 'route_name' => 'post'])
          
         @else 
            @include('includes.nodata', ['data' => "Sorry 0 Post Found" , 'route_name' => 'post'])  
          @endif


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