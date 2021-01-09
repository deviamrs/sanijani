@extends('layouts.app')

@section('content')

   <div class="w-100">
       <div class="col-md-3">
           <div class="card">
               {{-- <div class="card-header text-center bg-warning">
                 <img src="{{ asset('public/img/logo/logo.png') }}" width="130" alt="logo_image_not_loaded">
               </div> --}}

               <div class="card-body">
                   <form method="POST" action="{{ route('password.change' ,  Auth::user()->id)}}">
                       @csrf  @method('PUT')
                       <h3 class="text-center">Reset Password</h3>
                       <div class="form-group">
                           <label for="password" >New {{ __('Password') }}</label>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                          
                       </div>
                       <div class="form-group">
                           <label for="password" >Confirm {{ __('Password') }}</label>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                               @error('password_confirmation')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                          
                       </div>

                    

                       <div class="form-group">
                           <div class="col-md-12 ">
                               <button type="submit" class="btn btn-primary btn-block">
                                   Update Password
                               </button>
                              
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>




@endsection