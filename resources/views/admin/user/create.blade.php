@extends('layouts.app')

@section('content')

<div class="card col-md-8 col-lg-8 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Edit '. $user->name . ' Details' : 'Add user'}}  </h6>
   </div>
   <div class="card-body">
   <form  action="{{ isset($user) ? route('profile.update'  ,  $user->id ) : route('user.store')  }}"  method="post" enctype="multipart/form-data">
    @csrf
       @isset($user)
            @method('PUT') 
       @endisset 
       
        <div class="row">
           <div class="col-md-6 border-right">
               <div class="form-group">
               <label for="exampleInputPassword1">Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" placeholder="user name" name="name"  value="{{ isset($user) ? $user->name : old('name') }}"> 
               @error('name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Email Address" name="email"  value="{{ isset($user) ? $user->email : old('email') }}"> 
               @error('email')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>
      
             <div class="form-group">
               <label for="subheading">Gender</label>
               <select name="gender" id="" class="form-control @error('email') is-invalid @enderror">
                  @if (isset($user))
                    <option value="female"  @if ($user->profile->gender == 'female')
                        selected
                    @endif>Female</option>
                    <option value="male"  @if ($user->profile->gender == 'male')
                     selected @endif>Male</option>   
                  @else
                     <option value="female">Female</option>
                     <option value="male">Male</option> 
                  @endif 
      
                  
               </select>
               @error('gender')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            @if (isset($user))
            <div class="form-group">
               <label for="head">About</label>
               <textarea name="detail" id="" cols="30" rows="3" class="form-control @error('detail') is-invalid @enderror">{{ isset($user) ? $user->profile->detail : old('detail') }}</textarea>
               @error('detail')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            @endif
           </div>
           <div class="col-md-6">
            @if (isset($user))
            
            {{-- <div class="form-group">
               <label for="subheading">Facebook</label>
               <input type="link" name="facebook" id="" class="form-control @error('detail') is-invalid @enderror" value="{{ isset($user) ? $user->profile->facebook : old('facebook') }}">
               @error('facebook')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div> --}}
            {{-- <div class="form-group">
               <label for="subheading">Instagram</label>
               <input type="url" name="instagram" id="" class="form-control @error('instagram') is-invalid @enderror" value="{{ isset($user) ? $user->profile->instagram : old('instagram') }}">
               @error('instagram')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div> --}}
            <div class="form-group">
               <label for="subheading">Linked In</label>
               <input type="url" name="linkedin" id="" class="form-control @error('linkedin') is-invalid @enderror" value="{{ isset($user) ? $user->profile->linkedin : old('linkedin') }}">
               @error('linkedin')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading">New Image</label>
               <input type="file" name="avatar" id="" class="form-control">
               @error('avatar')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         @endif 

           </div>
        </div>

      

    


         <button type="submit" class="btn btn-primary btn-block text-capitalize">{{ isset($user) ? 'Update' : 'Add'}} user</button>
     </form>
   </div>
 </div>




    
@endsection