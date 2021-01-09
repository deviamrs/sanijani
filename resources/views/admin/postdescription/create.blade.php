

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-9 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($postdescription) ? 'Edit' : 'Add'}} postdescription To {{ $post->title }} </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($postdescription) ? route('postdescription.update' ,  $post->id , $postdescription->id ) : route('postdescription.store' , $post->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @isset($postdescription)
         @method('PUT')
      @endisset     
 
      <div class="form-group">
        <label for="">You Tube Url (<small> Leave Blank If You Not Want </small>)</label>
        <input type="text"  name="video_url" class="form-control @error('video_url') is-invalid @enderror"> 
        @error('video_url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>     
      @isset($postdescription)
            @if ($postdescription->additional_image != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
            <img src="{{ asset('public/'.$postdescription->additional_image) }}" alt=""  width="120">
            </div>   
         @endif
      @endisset  
      
         
      <div class="form-group">
            <label for="" class="d-block">New Image  (<small> Leave Blank If You Not Want </small>)</label> 
            <input type="file" name="additional_image" id=""  class="form-control @error('additional_image') is-invalid @enderror">
            @error('additional_image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
       </div>

       <div class="form-group">
         <label for="">Image Alt Description(For SEO) Leave Blank If You are not uploading an image</label>
         <input type="text"  name="description_alt_image" class="form-control @error('description_alt_image') is-invalid @enderror"> 
         @error('description_alt_image')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
         @enderror
       </div>   
     

      <div class="form-group">
         <label for="head">Additional Description (<small> Leave Blank If You Not Want </small>)</label>
         <textarea name="additional_text" id="additional_text" cols="30" rows="10" class="summernote form-control @error('title') is-invalid @enderror">{{ isset($postdescription) ? $postdescription->additional_text : old('additional_text') }}</textarea>
         @error('additional_text')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
         @enderror
      </div>
      


      <button type="submit" class="btn btn-primary btn-block" id="">Submit</button>
   
   </form>

   </div>
</div>
@endsection


@section('custom_Css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
@endsection

@section('style_inner')
<style>
   .ck.ck-content {
      min-height:120px;
   } 
   
   
   
   
   </style>
@endsection

@section('custom_JS')

<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>  --}}



<script>
  
  CKEDITOR.replace('additional_text', {
      extraPlugins: 'uploadimage,image2',
      height: 300,

    
      stylesSet: [{
          name: 'Narrow image',
          type: 'widget',
          widget: 'image',
          attributes: {
            'class': 'image-narrow'
          }
        },
        {
          name: 'Wide image',
          type: 'widget',
          widget: 'image',
          attributes: {
            'class': 'image-wide'
          }
        }
      ],

      // Load the default contents.css file plus customizations for this sample.
    

      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
      // resizer (because image size is controlled by widget styles or the image takes maximum
      // 100% of the editor width).
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true
    });
   

   
  
 
                               
   



 
     
</script>


<script>
  
//   const addimagecontentbtn = document.querySelector('#add-addtional-description-btn'), 
//         additionalDescriptionBox  = document.querySelector('#additional-description-box');
        
</script> 
    


@endsection







              

              <!-- Form Basic -->
        

         
             
           