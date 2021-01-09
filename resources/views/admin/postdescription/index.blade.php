

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')



@if ($postdescriptions->count() > 0)




<h5 class="text-primary">Additional Description / {{ $post->title }}</h5> 

 <div class="p-2 d-flex justify-content-between">
    
    <a href="{{ route('post.index') }}" class="btn btn-success my-2 mr-1"> < Go Back</a> 
    
    <div><a href="{{ route('post.show' , $post->id ) }}" class="btn btn-success my-2 mr-1">Show Post Preview </a>      <a href="{{ route('postdescription.create' , $post->id) }}" class="btn  btn-secondary my-2">Add Additional Rows To Post</a>  </div>  
     
 </div>


<div class="row">
    


@foreach ($postdescriptions as $key=>$item)
  
<section id="additional-description-box" class="col-md-6" >
    

      <div class="additonal-box-wrapper p-2 border mb-2 card" data-box-number="{{ $key+1 }}">
         <div class="header d-flex justify-content-between border-bottom py-2 mb-2">
         <h6>Addtional Description Box {{ $key+1 }} </h6>

          <form action="{{ route('postdescription.destroy' , [$post->id , $item->id ]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-icon-split btn-sm"><span class="icon text-white-50">
               <i class="fas fa-trash"></i>
             </span>
             <span class="text">Delete Box {{ $key+1 }}</span></button>
          </form>   
           
         </div> 

      <form action="{{ route('postdescription.update' , [$post->id , $item->id ]) }}" enctype="multipart/form-data" method="POST">
          @csrf 
          @method('PUT') 
          <div class="form-group">
            <label for="" class="d-block">Video_url {{ $key+1 }}</label> 
            <input type="text" name="video_url" id=""  class="form-control" value=
            
            
            
             @if ($item->video_url !== null)
                  
               {{ 'https://www.youtube.com/watch?v='.$item->video_url    }}

   
             @else
                 
                {{ '' }}
              
             @endif



            >
         </div>
         @if (!$item->additional_image == null)
             <div class="mb-4">
            <label for="" class="d-block">Current Image {{ $key+1 }}</label> 
               <img src="{{ asset('public/'.$item->additional_image) }}" alt="image_not_loaded" style="max-width: 150px" />
            </div>
            @endif
         <div class="form-group">
            <label for="" class="d-block">New Image {{ $key+1 }}</label> 
            <input type="file" name="additional_image" id=""  class="form-control">
         </div>
         <div class="form-group">
            <label for="">Image Alt Description <span class="text-danger">(For SEO) Leave Blank If You are not uploading an image</span></label>
            <input type="text"  name="description_alt_image" class="form-control @error('description_alt_image') is-invalid @enderror" placeholder="image decription" value="{{ $item->description_alt_image }}"> 
            @error('description_alt_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>   
         <div class="form-group">
            <label for="" class="d-block">Description  {{ $key+1 }} </label> 
             <textarea name="additional_text" id="more-description-content={{ $key+1 }}" cols="30" rows="3" class="ckeditor form-control more-description-content">{{ $item->additional_text }}</textarea>                  
         </div>
          <button type="submit" class="btn btn-primary btn-block">Update Row {{ $key+1 }}</button>  
      </form>  
   </div>
</section> 

  


@endforeach 


</div>

@else
  <div class="card mt-5"  ></div>
   <center class="h5">Sorry Currently No Adtional Rows in  <span class="font-weight-bold text-primary">{{ $post->title }} </span> </center>


   <center> <a href="{{ route('postdescription.create' , $post->id) }}" class="btn  btn-secondary my-2">Add Additional Rows To Post</a>   </center> 



@endif 


@endsection


@section('custom_JS')
   <script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
    <script>
        
        const ckboxes = document.querySelectorAll('.ckeditor');

        ckboxes.forEach(box => {
            
             let id = box.getAttribute('id');

             CKEDITOR.replace( id , {
                  extraPlugins: 'uploadimage,image2',
                  height: 200,

            })
           

        });


    </script>

@endsection