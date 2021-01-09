@extends('layouts.app')

@section('title' , \Request::route()->getName() )
    



@section('content')


<div class="card col-md-6 col-lg-4 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($category) ? 'Edit' : 'Add'}} Category </h6>
   </div>
   <div class="card-body">
   <form  action="{{ isset($category) ? route('category.update' , $category->id ) : route('category.store')  }}"  method="post">
    @csrf
       @isset($category)
            @method('PUT') 
       @endisset  
       {{-- <div class="form-group">
        <label for="head">Select Blog SuperCategory</label>
         <select name="supercategory_id" id="" class="form-control">
             @foreach ($supercategories as $supercategory)
             <option value="{{ $supercategory->id }}" 
              @if (isset($category))  @if ($supercategory->id == $category->supercategory_id)  selected @endif @endif >{{ $supercategory->name }}</option> 
             @endforeach
         </select>
         @error('supercategory_id')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
         @enderror
      </div> --}}

       <div class="form-group">
         <label for="exampleInputPassword1">Name</label>
         <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="category name" name="name"  value="{{ isset($category) ? $category->name : old('name') }}"> 
         @error('name')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
         @enderror
       </div>
       
        


      <button type="submit" class="btn btn-primary btn-block text-capitalize">{{ isset($category) ? 'Update' : 'Add'}} Category</button>
     </form>
   </div>
 </div>
@endsection








              

              <!-- Form Basic -->
        

         
             
           