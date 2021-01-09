

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-6 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   <h6 class="m-0 font-weight-bold text-primary">{{ isset($about) ? 'Edit' : 'Add'}} {{ isset($about) ? $about->page_name : '' }} </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($about) ? route('about.update' , $about->id) : route('about.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($about)
         @method('PUT')
      @endisset     
      <div class="row">
         <div class="col-md-12">
              


            <div class="form-group">
               <label for="about Main Heading"> about Main Heading</label>
               <input type="text" class="form-control @error('about_heading') is-invalid @enderror" placeholder="about Heading" name="about_heading"  value="{{ isset($about) ? $about->about_heading : old('about_heading') }}"> 
               @error('about_heading')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>     
             <div class="from-group">
               <label for="" class="d-block">About Section Status</label>
               <input type="radio" name="status" value="1" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"

               @isset($about)
               @if ($about->status == 1)
                   checked
               @endif
               @endisset >Active 
               <span class="mr-2"></span>
               <input type="radio" name="status" value="0" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($about)
               @if ($about->status == 0)
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
           <div class="form-group">
            <label for="head">About Description</label>
            <textarea name="about_content" id="about_content" cols="30" rows="10" class="form-control @error('title') is-invalid @enderror">{{ isset($about) ? $about->about_content : old('about_content') }}</textarea>
            @error('about_content')
            <span class="text-danger" role="alert">
               <small>{{ $message }}</small>
           </span>
            @enderror
         </div>
         </div>
      
      </div>
      <br>
    

      <button type="submit" class="btn btn-primary btn-block" id="">Submit</button>
      
   </form>
  
   </div>
</div>
@endsection

@section('custom_JS')
 
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>

<script>


CKEDITOR.replace('about_content', {
      height: 300,
    });
</script>


@endsection









              

              <!-- Form Basic -->
        

         
             
           