@extends('layouts.app')

@section('content')


<div class="card col-md-6 col-lg-4 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($tag) ? 'Edit' : 'Add'}} Tag </h6>
   </div>
   <div class="card-body">
   <form  action="{{ isset($tag) ? route('tag.update' , $tag->id ) : route('tag.store')  }}"  method="post">
    @csrf
       @isset($tag)
            @method('PUT') 
       @endisset 
       <div class="form-group">
         <label for="exampleInputPassword1">Name</label>
         <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="tag name" name="name"  value="{{ isset($tag) ? $tag->name : old('name') }}"> 
         @error('name')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
         @enderror
       </div>
      <button type="submit" class="btn btn-primary btn-block text-capitalize">{{ isset($tag) ? 'Update' : 'Add'}} tag</button>
     </form>
   </div>
 </div>

    
@endsection