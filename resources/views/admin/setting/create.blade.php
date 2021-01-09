

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-12 mb-4"  >
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">Edit General Setting</h6>
   </div>
   <div class="card-body">
   
    

   <form  action="{{ route('setting.update' , $setting->id ) }}"  method="post">
       @csrf  @method('PUT')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
        <input  class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="address" value="{{ $setting->address }}">
          
            
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Map Url</label>
        <textarea  class="form-control @error('map_url') is-invalid @enderror" rows="5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="map_url">{{ $setting->map_url }}</textarea> 
            @error('map_url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Office Hours</label>
        <input  class="form-control @error('office_hours') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Office Hours" name="office_hours" value="{{ $setting->office_hours }}">
          
            
            @error('office_hours')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Phone One</label>
        <input  class="form-control @error('phone_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="phone_one" value="{{ $setting->phone_one }}">
            @error('phone_one')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>  --}}
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
        <input  class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone" name="phone" value="{{ $setting->phone }}">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> 
        
        

      </div>
      
      <div class="col-md-6">

        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Email One</label>
        <input  class="form-control @error('mail_id_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail_id_one" value="{{ $setting->mail_id_one }}">
            @error('mail_id_one')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>  --}}
        <div class="form-group">
          <label for="exampleInputEmail1">Email </label>
        <input  class="form-control @error('mail_id') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail_id" value="{{ $setting->mail_id }}">
            @error('mail_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> 
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Whatsapp Number</label>
        <input  class="form-control @error('whatsapp_number') is-invalid @enderror" id="exampleInputEmail1"  placeholder="Whatapp_number" name="whatsapp_number" value="{{ $setting->whatsapp_number }}">
            @error('whatsapp_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>  --}}

      
        <div class="form-group">
          <label for="exampleInputPassword1">Instagram</label>
          <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="exampleInputPassword1" placeholder="instagram" name="instagram"  value="{{ $setting->instagram }}"> 
          @error('instagram')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Linkedin</label>
          <input type="url" class="form-control @error('linkedin') is-invalid @enderror" id="exampleInputPassword1" placeholder="linkedin" name="linkedin"  value="{{ $setting->linkedin }}">
          @error('linkedin')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
         <div class="form-group">
          <label for="exampleInputPassword1">Twitter</label>
          <input type="url" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputPassword1" placeholder="twitter" name="twitter"  value="{{ $setting->twitter }}">
          @error('twitter')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Facebook</label>
          <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputPassword1" placeholder="facebook" name="facebook"  value="{{ $setting->facebook }}">
          @error('facebook')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{--
        <div class="form-group">
          <label for="exampleInputPassword1">You Tube</label>
          <input type="url" class="form-control @error('youtube') is-invalid @enderror" id="exampleInputPassword1" placeholder="instgram" name="youtube"  value="{{ $setting->youtube }}">
          @error('youtube')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div> --}}
      </div>
    </div>

       
     
       
     
       <button type="submit" class="btn btn-primary btn-block">Update</button>
     </form>
   </div>
 </div>


@endsection








              

              <!-- Form Basic -->
        

         
             
           