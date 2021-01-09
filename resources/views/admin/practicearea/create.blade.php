

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')

<div class="card col-md-12 col-lg-9 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   <h6 class="m-0 font-weight-bold text-primary">{{ isset($practiceArea) ? 'Edit' : 'Add'}} {{ isset($practiceArea) ? $practiceArea->practice_head : '' }} Practice Area </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($practiceArea) ? route('practiceArea.update' , $practiceArea->id) : route('practiceArea.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($practiceArea)
         @method('PUT')
      @endisset     
      <div class="row">
         <div class="col-md-6">  
            
            <div class="form-group">
               <label for="practicearea Main Heading">Practice Area head</label>
               <input type="text" class="form-control @error('practice_head') is-invalid @enderror" placeholder="Practice Area Name" name="practice_head"  value="{{ isset($practiceArea) ? $practiceArea->practice_head : old('practice_head') }}"> 
               @error('practice_head')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div> 
            
             <div class="from-group">
               <label for="" class="d-block">Practice Area Status</label>
               <input type="radio" name="status" value="1" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"

               @isset($practiceArea)
               @if ($practiceArea->status == 1)
                   checked
               @endif
               @endisset >Active 
               <span class="mr-2"></span>
               <input type="radio" name="status" value="0" class="mr-2" class="custom-control-input @error('status') is-invalid @enderror"
               @isset($practiceArea)
               @if ($practiceArea->status == 0)
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
           {{-- <div class="form-group">
            <label for="head">practicearea Description</label>
            <textarea name="practicearea_description" id="practicearea_description" cols="30" rows="10" class="form-control @error('title') is-invalid @enderror">{{ isset($practiceArea) ? $practiceArea->practicearea_description : old('practicearea_description') }}</textarea>
            @error('practicearea_description')
            <span class="text-danger" role="alert">
               <small>{{ $message }}</small>
           </span>
            @enderror
         </div> --}}
         </div>
           <div class="col-md-6">
            @isset($practiceArea)
            @if ($practiceArea->practice_image != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
            <img src="{{ asset('public/'.$practiceArea->practice_image) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading">practicearea Image</label>
               <input type="file" name="practice_image" id="" class="form-control @error('practice_image') is-invalid @enderror">
               @error('practice_image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading">Image Alt Data (For SEO)</label>
               <input type="text" class="form-control @error('image_alt') is-invalid @enderror" placeholder="image Alt Data" name="image_alt"  value="{{ isset($practiceArea) ? $practiceArea->image_alt : old('image_alt') }}"> 
               @error('image_alt')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
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


CKEDITOR.replace('practicearea_description', {
      height: 300,
    });
</script>


@endsection









              

              <!-- Form Basic -->
        

         
             
           