

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')








<div class="card col-md-12 col-lg-12 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($service) ? 'Edit' : 'Add'}} service </h6>
   </div>
   <div class="card-body">

  


   <form action="{{ isset($service) ? route('service.update' , $service->id) : route('service.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($service)
         @method('PUT')
      @endisset     
      
      <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="" class="text-capitalize">Service name</label>
             <input type="text" name="service_name" id="" class="form-control @error('service_name') is-invalid @enderror" placeholder="service name" value="{{ isset($service) ? $service->service_name : old('service_name') }}">
                @error('service_name')
                <span class="invalid-feedback" role="alert">
                  {{ $message   }}
                 </span>
                @enderror
             </div>
             <div class="from-group">
               <label for="" class="d-block">Service Status</label>
               <input type="radio" name="status" value="1" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"

               @isset($service)
               @if ($service->status == 1)
                   checked
               @endif
               @endisset >Active 
               <span class="mr-2"></span>
               <input type="radio" name="status" value="0" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($service)
               @if ($service->status == 0)
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
            <label for="" class="d-block">Service Front Page Status</label>
            <input type="radio" name="status_front" value="1" class="mr-2" class="custom-control-input @error('status_front') is-invalid @enderror"
            @isset($service)
            @if ($service->status_front == 1)
                checked
            @endif
            @endisset >Active 
            <span class="mr-2"></span>
            <input type="radio" name="status_front" value="0" class="mr-2" class="custom-control-input @error('status_front') is-invalid @enderror"
            @isset($service)
            @if ($service->status_front == 0)
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
               <label for="subheading" class="text-capitalize">Service Home Page Card Data</label>
               <textarea rows="4" class="form-control @error('front_service_data') is-invalid @enderror" placeholder="Service Front Card Data" name="front_service_data" >{{ isset($service) ? $service->front_service_data : old('front_service_data') }}</textarea> 
               @error('front_service_data')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Service Page Title (For SEO)</label>
               <input type="text" class="form-control @error('page_title') is-invalid @enderror" placeholder="service page title" name="page_title"  value="{{ isset($service) ? $service->page_title : old('page_title') }}"> 
               @error('page_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-group">
               <label for="subheading" class="text-capitalize"> Page Meta Title (For SEO)</label>
               <input type="text" class="form-control @error('page_meta_title') is-invalid @enderror" placeholder="page meta title" name="page_meta_title"  value="{{ isset($service) ? $service->page_meta_title : old('page_meta_title') }}"> 
               @error('page_meta_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-group">
               <label for="subheading" class="text-capitalize">service Page Description (For SEO)</label>
               <input type="text" class="form-control @error('page_decription') is-invalid @enderror" placeholder="service page desciption" name="page_decription"  value="{{ isset($service) ? $service->page_decription : old('page_decription') }}"> 
               @error('page_decription')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Page Meta Description (For SEO)</label>
               <input type="text" class="form-control @error('page_meta_decription') is-invalid @enderror" placeholder="page meta description" name="page_meta_decription"  value="{{ isset($service) ? $service->page_meta_decription : old('page_meta_decription') }}"> 
               @error('page_meta_decription')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>

         <div class="col-md-6">
            @isset($service)
            @if ($service->service_front_image != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
            <img src="{{ asset('public/'.$service->service_front_image) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Service Front  Image</label>
               <input type="file" name="service_front_image" id="" class="form-control @error('service_front_image') is-invalid @enderror">
               @error('service_front_image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Front Image Alt Data (For SEO)</label>
               <input type="text" class="form-control @error('front_image_alt') is-invalid @enderror" placeholder="image Alt Data" name="front_image_alt"  value="{{ isset($service) ? $service->front_image_alt : old('front_image_alt') }}"> 
               @error('front_image_alt')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>



            @isset($service)
            @if ($service->service_banner != null)
            <div class="form-group">
               <label for="" class="d-block">Current Banner Image </label>   
            <img src="{{ asset('public/'.$service->service_banner) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading" class="text-capitalize">Banner Image</label>
               <input type="file" name="service_banner" id="" class="form-control @error('service_banner') is-invalid @enderror">
               @error('service_banner')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>


            <div class="form-group">
               <label for="subheading" class="text-capitalize">Service Front Data</label>
               <textarea type="text" class="form-control @error('service_front_data') is-invalid @enderror" placeholder="image Alt Data" name="service_front_data" >{{ isset($service) ? $service->service_front_data : old('service_front_data') }}</textarea> 
               @error('service_front_data')
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
CKEDITOR.replace('service_front_data', {
      height: 300,
    });

</script>
@endsection









              

              <!-- Form Basic -->
        

         
             
           