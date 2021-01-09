

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')








<div class="card col-md-12 col-lg-12 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($location) ? 'Edit' : 'Add'}} location </h6>
   </div>
   <div class="card-body">

  


   <form action="{{ isset($location) ? route('location.update' , $location->id) : route('location.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($location)
         @method('PUT')
      @endisset     
      
      <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="" class="text-capitalize">location name</label>
             <input type="text" name="location_name" id="" class="form-control @error('location_name') is-invalid @enderror" placeholder="location name" value="{{ isset($location) ? $location->location_name : old('location_name') }}">
                @error('location_name')
                <span class="invalid-feedback" role="alert">
                  {{ $message   }}
                 </span>
                @enderror
             </div>
             <div class="from-group">
               <label for="" class="d-block">location Status</label>
               <input type="radio" name="status" value="1" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"

               @isset($location)
               @if ($location->status == 1)
                   checked
               @endif
               @endisset >Active 
               <span class="mr-2"></span>
               <input type="radio" name="status" value="0" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($location)
               @if ($location->status == 0)
                   checked
               @endif
               @endisset
                >Not Active
               @error('status') <br>
               <span class="text-danger" role="alert">
                   <small>{{ $message }}</small>
               </span>
               @enderror
           </div> 
           <br>
           <br>
           <br>

           <div class="from-group">
            <label for="" class="d-block">location Front Page Status</label>
            <input type="radio" name="status_front" value="1" class="mr-2" class="custom-control-input @error('status_front') is-invalid @enderror"
            @isset($location)
            @if ($location->status_front == 1)
                checked
            @endif
            @endisset >Active 
            <span class="mr-2"></span>
            <input type="radio" name="status_front" value="0" class="mr-2" class="custom-control-input @error('status_front') is-invalid @enderror"
            @isset($location)
            @if ($location->status_front == 0)
                checked
            @endif
            @endisset
             >Not Active
            @error('status_front') <br>
            <span class="text-danger" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div> 
        <br>
        <br>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">location Home Page Card Data</label>
               <textarea rows="4" class="form-control @error('front_location_data') is-invalid @enderror" placeholder="location Front Card Data" name="front_location_data" >{{ isset($location) ? $location->front_location_data : old('front_location_data') }}</textarea> 
               @error('front_location_data')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">location Page Title (For SEO)</label>
               <input type="text" class="form-control @error('page_title') is-invalid @enderror" placeholder="location page title" name="page_title"  value="{{ isset($location) ? $location->page_title : old('page_title') }}"> 
               @error('page_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-group">
               <label for="subheading" class="text-capitalize"> Page Meta Title (For SEO)</label>
               <input type="text" class="form-control @error('page_meta_title') is-invalid @enderror" placeholder="page meta title" name="page_meta_title"  value="{{ isset($location) ? $location->page_meta_title : old('page_meta_title') }}"> 
               @error('page_meta_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-group">
               <label for="subheading" class="text-capitalize">location Page Description (For SEO)</label>
               <input type="text" class="form-control @error('page_decription') is-invalid @enderror" placeholder="location page desciption" name="page_decription"  value="{{ isset($location) ? $location->page_decription : old('page_decription') }}"> 
               @error('page_decription')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Page Meta Description (For SEO)</label>
               <input type="text" class="form-control @error('page_meta_decription') is-invalid @enderror" placeholder="page meta description" name="page_meta_decription"  value="{{ isset($location) ? $location->page_meta_decription : old('page_meta_decription') }}"> 
               @error('page_meta_decription')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>

         <div class="col-md-6">
            @isset($location)
            @if ($location->location_front_image != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
            <img src="{{ asset('public/'.$location->location_front_image) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading" class="text-capitalize">location Front  Image</label>
               <input type="file" name="location_front_image" id="" class="form-control @error('location_front_image') is-invalid @enderror">
               @error('location_front_image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Front Image Alt Data (For SEO)</label>
               <input type="text" class="form-control @error('front_image_alt') is-invalid @enderror" placeholder="image Alt Data" name="front_image_alt"  value="{{ isset($location) ? $location->front_image_alt : old('front_image_alt') }}"> 
               @error('front_image_alt')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>



            @isset($location)
            @if ($location->location_banner != null)
            <div class="form-group">
               <label for="" class="d-block">Current Banner Image </label>   
            <img src="{{ asset('public/'.$location->location_banner) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Banner Image</label>
               <input type="file" name="location_banner" id="" class="form-control @error('location_banner') is-invalid @enderror">
               @error('location_banner')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>


            <div class="form-group">
               <label for="subheading" class="text-capitalize">location Front Data</label>
               <textarea type="text" class="form-control @error('location_front_data') is-invalid @enderror" placeholder="image Alt Data" name="location_front_data" >{{ isset($location) ? $location->location_front_data : old('location_front_data') }}</textarea> 
               @error('location_front_data')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>

      </div>
       

   

      <button type="submit" class="btn btn-primary btn-block" id="">Submit</button>
      
   </form>
  
   </div>
</div>
@endsection

@section('custom_JS')
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
<script>
CKEDITOR.replace('location_front_data', {
      height: 300,
    });

</script>
@endsection









              

              <!-- Form Basic -->
        

         
             
           