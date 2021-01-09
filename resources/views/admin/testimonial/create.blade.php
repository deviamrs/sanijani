

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-6 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($testimonial) ? 'Edit' : 'Add'}} testimonial </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($testimonial) ? route('testimonial.update' , $testimonial->id) : route('testimonial.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($testimonial)
         @method('PUT')
      @endisset     
      <div class="row">
         <div class="col-md-12">

            <div class="form-group">
                <label for="">Testimonial Data</label>
                <textarea name="testimonial_content" id="" cols="30" rows="5" class="form-control  @error('testimonial_content') is-invalid @enderror" > {{  isset($testimonial) ? $testimonial->testimonial_content : old('testimonial_content')}}</textarea>
          
                @error('testimonial_content')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                </div> 

               
             <div class="from-group">
               <label for="" class="d-block">testimonial Status</label>
               <input type="radio" name="status" value="1" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($testimonial)
               @if ($testimonial->status == 1)
                   checked
               @endif
               @endisset >Active 
               <span class="mr-2"></span>
               <input type="radio" name="status" value="0" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($testimonial)
               @if ($testimonial->status == 0)
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
           <div class="from-group">
            <label for="" class="d-block">Featured Status</label>
            <input type="radio" name="featured" value="1" class="mr-2" class="custom-control-input @error('featured') is-invalid @enderror"
            @isset($testimonial)
            @if ($testimonial->featured == 1)
                checked
            @endif
            @endisset >Active 
            <span class="mr-2"></span>
            <input type="radio" name="featured" value="0" class="mr-2" class="custom-control-input @error('featured') is-invalid @enderror"
            @isset($testimonial)
            @if ($testimonial->featured == 0)
                checked
            @endif
            @endisset
            >Not Active
            @error('featured') <br>
            <span class="text-danger" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div> 
        <br>

           <div class="form-group">
            <label for="subheading">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name" name="name"  value="{{ isset($testimonial) ? $testimonial->name : old('name') }}"> 
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
           <div class="form-group">
            <label for="subheading">place</label>
            <input type="text" class="form-control @error('place') is-invalid @enderror" placeholder="place" name="place"  value="{{ isset($testimonial) ? $testimonial->place : old('place') }}"> 
            @error('place')
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


CKEDITOR.replace('testimonial_content', {
      height: 300,
    });
</script>


@endsection








              

              <!-- Form Basic -->
        

         
             
           